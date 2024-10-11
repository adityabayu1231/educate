<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('admin.master.matapelajaran', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kdkelas' => 'required|string',
            'kdmapel' => 'required|string',
            'nama_mapel' => 'required|string',
            'cover' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $subject = new Subject();
        $subject->kdkelas = strtolower($request->kdkelas); // Convert to lowercase
        $subject->kdmapel = strtolower($request->kdmapel); // Convert to lowercase
        $subject->nama_mapel = $request->nama_mapel;

        if ($request->hasFile('cover')) {
            $subject->cover = $request->file('cover')->store('covers_mapel', 'public');
        }

        $subject->is_active = $request->is_active === '1'; // Convert to boolean
        $subject->save();

        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'kdkelas' => 'required|string', // Kode Kelas should be provided
            'kdmapel' => 'required|string', // Kode Mata Pelajaran should be provided
            'nama_mapel' => 'required|string',
            'cover' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean', // Change to boolean
        ]);

        $subject->kdkelas = $request->kdkelas; // Get Kode Kelas from the form
        $subject->kdmapel = $request->kdmapel; // Get Kode Mata Pelajaran from the form
        $subject->nama_mapel = $request->nama_mapel;

        if ($request->hasFile('cover')) {
            if ($subject->cover) {
                Storage::disk('public')->delete($subject->cover);
            }
            $subject->cover = $request->file('cover')->store('covers', 'public');
        }

        // Use boolean directly
        $subject->is_active = $request->is_active;
        $subject->save();

        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        if ($subject->cover) {
            Storage::disk('public')->delete($subject->cover);
        }
        $subject->delete();

        return redirect()->back()->with('success', 'Mata Pelajaran berhasil dihapus!');
    }

    public function toggleActive(Request $request, Subject $subject): JsonResponse
    {
        try {
            // Validasi agar is_active hanya berupa boolean (1 atau 0)
            $request->validate([
                'is_active' => 'required|boolean',
            ]);

            // Update hanya field is_active
            $subject->is_active = $request->input('is_active');
            $subject->save(); // Simpan perubahan ke database tanpa insert baru

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error and return a response with the error message

            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
