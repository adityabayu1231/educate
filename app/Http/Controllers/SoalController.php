<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_paket)
    {
        $id = $id_paket;
        $soals = Soal::where('paket_soal_id', $id_paket)->paginate(10);

        $paket = Paket::findOrFail($id_paket);

        return view('admin.educenter.soal.index', compact('soals', 'paket', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pakets = Paket::all();
        $paketId = $request->query('paket_id');
        return view('admin.educenter.soal.addsoal', compact('pakets', 'paketId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        // Setelah menyimpan data soal
        return redirect()->route('admin.paket.soals.index', ['id_paket' => $request->paket_soal_id])->with('status', 'Soal berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        $pakets = Paket::all(); // Ambil semua paket soal

        return view('admin.educenter.soal.editsoal', compact('soal', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'paket_soal_id' => 'required|exists:pakets,id',
            'bab' => 'required|string|max:255',
            'soal' => 'required|string',
            'soal_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pil_a' => 'required|string',
            'pil_b' => 'required|string',
            'pil_c' => 'required|string',
            'pil_d' => 'required|string',
            'pil_e' => 'required|string',
            'jawaban' => 'required|in:A,B,C,D,E',
            'pembahasan' => 'nullable|string',
            'gambar_pembahasan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_penjelasan' => 'nullable|url',
        ]);

        $soal = Soal::findOrFail($id);
        $soal->paket_soal_id = $request->paket_soal_id;
        $soal->bab = $request->bab;
        $soal->soal = $request->soal;

        // Cek jika ada gambar soal yang diupload
        if ($request->hasFile('soal_gambar')) {
            // Hapus gambar lama jika ada
            if ($soal->soal_gambar) {
                Storage::delete($soal->soal_gambar);
            }
            // Simpan gambar baru
            $soal->soal_gambar = $request->file('soal_gambar')->store('soal_gambar');
        }

        // Set pilihan jawaban
        $soal->pil_a = $request->pil_a;
        $soal->skor_a = $request->skor_a;
        $soal->pil_b = $request->pil_b;
        $soal->skor_b = $request->skor_b;
        $soal->pil_c = $request->pil_c;
        $soal->skor_c = $request->skor_c;
        $soal->pil_d = $request->pil_d;
        $soal->skor_d = $request->skor_d;
        $soal->pil_e = $request->pil_e;
        $soal->skor_e = $request->skor_e;
        $soal->jawaban = $request->jawaban;

        // Cek jika ada gambar pembahasan yang diupload
        if ($request->hasFile('gambar_pembahasan')) {
            // Hapus gambar lama jika ada
            if ($soal->gambar_pembahasan) {
                Storage::delete($soal->gambar_pembahasan);
            }
            // Simpan gambar baru
            $soal->gambar_pembahasan = $request->file('gambar_pembahasan')->store('gambar_pembahasan');
        }

        // Set pembahasan dan video penjelasan
        $soal->pembahasan = $request->pembahasan;
        $soal->video_penjelasan = $request->video_penjelasan;

        // Simpan perubahan ke database
        $soal->save();
        return redirect()->route('admin.paket.soals.index', ['id_paket' => $request->paket_soal_id])->with('status', 'Soal berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal $soal)
    {
        // Ambil id_paket dari soal yang ingin dihapus
        $paketId = $soal->paket_soal_id;

        // Hapus soal dari database
        $soal->delete();

        // Redirect dengan pesan sukses ke halaman daftar soal sesuai id_paket
        return redirect()->route('admin.paket.soals.index', ['id_paket' => $paketId])->with('status', 'Soal berhasil dihapus!');
    }
}
