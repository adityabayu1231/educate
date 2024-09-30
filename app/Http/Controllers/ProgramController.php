<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    // Menampilkan halaman CRUD
    public function index()
    {
        $programs = Program::all();
        return view('admin.program', compact('programs'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name_program' => 'required|string|max:255',
                'is_active' => 'nullable|boolean',
                'description' => 'nullable|string',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $imagePath = null;
            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('program_images', 'public');
            }

            Program::create([
                'name_program' => $request->input('name_program'),
                'is_active' => $request->input('is_active', false), // Default ke false jika tidak ada
                'description' => $request->input('description'),
                'cover_image' => $imagePath,
            ]);

            return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Database error: ' . $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }

    // Memperbarui program di database
    public function update(Request $request, Program $program)
    {
        try {
            // Validasi input
            $request->validate([
                'name_program' => 'required|string|max:255',
                'is_active' => 'nullable|boolean',
                'description' => 'nullable|string',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Menyimpan gambar jika ada
            if ($request->hasFile('cover_image')) {
                // Hapus gambar lama jika ada
                if ($program->cover_image) {
                    Storage::disk('public')->delete($program->cover_image);
                }

                $imagePath = $request->file('cover_image')->store('program_images', 'public');
            } else {
                $imagePath = $program->cover_image;
            }

            // Memperbarui data program di database
            $program->update([
                'name_program' => $request->input('name_program'),
                'is_active' => $request->input('is_active', $program->is_active),
                'description' => $request->input('description'),
                'cover_image' => $imagePath,
            ]);

            return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update program: ' . $e->getMessage()]);
        }
    }


    // Menghapus program dari database
    public function destroy(Program $program)
    {
        // Hapus gambar jika ada
        if ($program->cover_image) {
            Storage::disk('public')->delete($program->cover_image);
        }

        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully.');
    }

    public function toggleActive(Request $request, Program $program): JsonResponse
    {
        try {
            // Validasi agar is_active hanya berupa boolean (1 atau 0)
            $request->validate([
                'is_active' => 'required|boolean',
            ]);

            $program->is_active = $request->input('is_active');
            $program->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
