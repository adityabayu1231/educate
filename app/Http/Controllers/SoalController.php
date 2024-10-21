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
        return view('admin.educenter.soal.addsoal', compact('pakets'));
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
            'soal_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:12048', // Validasi gambar soal
            'pil_a' => 'required|string',
            'skor_a' => 'nullable|integer',
            'pil_b' => 'required|string',
            'skor_b' => 'nullable|integer',
            'pil_c' => 'required|string',
            'skor_c' => 'nullable|integer',
            'pil_d' => 'required|string',
            'skor_d' => 'nullable|integer',
            'pil_e' => 'required|string',
            'skor_e' => 'nullable|integer',
            'jawaban' => 'required|string',
            'pembahasan' => 'nullable|string',
            'gambar_pembahasan' => 'nullable|image|mimes:jpg,jpeg,png|max:12048', // Validasi gambar pembahasan
            'video_penjelasan' => 'nullable|url',
            'bab' => 'nullable|string',
        ]);

        // Siapkan data untuk disimpan
        $data = $request->all();

        // Proses upload gambar soal jika ada
        if ($request->hasFile('soal_gambar')) {
            $data['soal_gambar'] = $request->file('soal_gambar')->store('admin/uploads/educenter/soal', 'public');
        }

        // Proses upload gambar pembahasan jika ada
        if ($request->hasFile('gambar_pembahasan')) {
            $data['gambar_pembahasan'] = $request->file('gambar_pembahasan')->store('admin/uploads/educenter/pembahasan', 'public');
        }

        // Simpan data soal baru ke database
        Soal::create($data);

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
