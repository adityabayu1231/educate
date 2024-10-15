<?php

namespace App\Http\Controllers;

use App\Models\Tahunajaran;
use Illuminate\Http\Request;

class TahunajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaran = Tahunajaran::all();
        return view('admin.master.tahunajaran', compact('tahunAjaran'));
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
            'name' => 'required|string|max:255',
        ]);

        TahunAjaran::create($request->only('name'));

        return redirect()->route('admin.tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tahunajaran $tahunajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tahunajaran $tahunajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tahunajaran = Tahunajaran::findOrFail($id);
        $tahunajaran->update($request->only('name'));

        return redirect()->route('admin.tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();
        return redirect()->route('admin.tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil dihapus.');
    }
}
