<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = Paket::all();
        return view('admin.master.paket', compact('pakets'));
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
        try {
            $validator = Validator::make($request->all(), [
                'nama_paket' => 'required|string',
                'mapel_id' => 'required|exists:subjects,id',
                'durasi' => 'required|integer',
                'penilaian' => 'required|string',
                'urutan' => 'required|integer',
                'video_pembahasan' => 'nullable|string',
                'video_pembahasan_free' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Paket::create($request->all());

            return redirect()->route('admin.paket.index')->with('success', 'Paket created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $paket = Paket::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nama_paket' => 'required|string',
                'mapel_id' => 'required|exists:subjects,id',
                'durasi' => 'required|integer',
                'penilaian' => 'required|string',
                'urutan' => 'required|integer',
                'video_pembahasan' => 'nullable|string',
                'video_pembahasan_free' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $paket->update($request->all());

            return redirect()->route('admin.paket.index')->with('success', 'Paket updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $paket = Paket::findOrFail($id);
            $paket->delete();

            return redirect()->route('admin.paket.index')->with('success', 'Paket deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
