<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Paket;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua soal dengan pagination
        $soals = Soal::paginate(10); // Misalnya, tampilkan 10 soal per halaman
        return view('admin.educenter.soal.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil paket soal untuk pilihan dropdown
        $pakets = Paket::all();
        return view('admin.soals.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'paket_soal_id' => 'required|exists:pakets,id',
            'soal' => 'required|string',
            'pil_a' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        // Simpan data soal baru ke database
        Soal::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('soals.index')->with('status', 'Soal berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal $soal)
    {
        // Ambil paket soal untuk pilihan dropdown
        $pakets = Paket::all();
        return view('admin.soals.edit', compact('soal', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soal $soal)
    {
        // Validasi input form
        $request->validate([
            'paket_soal_id' => 'required|exists:pakets,id',
            'soal' => 'required|string',
            'pil_a' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        // Update data soal
        $soal->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('soals.index')->with('status', 'Soal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal $soal)
    {
        // Hapus soal dari database
        $soal->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('soals.index')->with('status', 'Soal berhasil dihapus!');
    }
}
