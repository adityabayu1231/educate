<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EduCenterController extends Controller
{
    public function index()
    {
        return view('admin.educenter.index');
    }

    public function eModule()
    {
        return view('admin.educenter.emodule');
    }

    public function paketSoal()
    {
        $pakets = Paket::with('subject')->paginate(10);;
        $mapel = Subject::all();

        return view('admin.educenter.paketsoal', compact('pakets', 'mapel'));
    }

    public function assignPaketSoal()
    {
        return view('admin.educenter.assign');
    }

    public function addPaket()
    {
        $mapel = Subject::all(); // Ambil semua data mapel
        return view('admin.educenter.addpaket', compact('mapel'));
    }

    public function storePaketSoal(Request $request)
    {
        $request->validate([
            'nama_paket_soal' => 'required|string|max:255',
            'mapel_id' => 'required|exists:subjects,id',
            'durasi' => 'required|integer',
            'penilaian' => 'required|string',
            'urutan' => 'required|integer',
            'video_pembahasan' => 'nullable|url',
            'video_pembahasan_free' => 'nullable|url',
        ]);

        // Ekstraksi ID dari URL YouTube jika ada
        $videoPembahasanId = $this->getYoutubeId($request->video_pembahasan);
        $videoPembahasanFreeId = $this->getYoutubeId($request->video_pembahasan_free);

        // Simpan data paket
        Paket::create([
            'nama_paket_soal' => $request->nama_paket_soal,
            'mapel_id' => $request->mapel_id,
            'durasi' => $request->durasi,
            'penilaian' => $request->penilaian,
            'urutan' => $request->urutan,
            'video_pembahasan' => $videoPembahasanId ? "https://www.youtube.com/embed/$videoPembahasanId" : null,
            'video_pembahasan_free' => $videoPembahasanFreeId ? "https://www.youtube.com/embed/$videoPembahasanFreeId" : null,
        ]);

        return redirect()->route('admin.paket-soal')->with('status', 'Paket Soal berhasil disimpan.');
    }

    // Fungsi untuk mengekstrak ID YouTube dari URL
    private function getYoutubeId($url)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }

    // Update Paket Soal
    public function update(Request $request, $id)
    {
        // Validasi input untuk semua field
        $request->validate([
            'nama_paket_soal' => 'required|string|max:255',
            'subject_id' => 'required|integer',
            'durasi' => 'required|integer|min:1',
            'penilaian' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
            'video_pembahasan' => 'nullable|url',
            'video_pembahasan_free' => 'nullable|url',
        ]);

        try {
            // Ambil data paket soal berdasarkan ID
            $paket = Paket::findOrFail($id);

            // Update data paket soal
            $paket->update([
                'nama_paket_soal' => $request->nama_paket_soal,
                'subject_id' => $request->subject_id,
                'durasi' => $request->durasi,
                'penilaian' => $request->penilaian,
                'urutan' => $request->urutan,
                'video_pembahasan' => $request->video_pembahasan,
                'video_pembahasan_free' => $request->video_pembahasan_free,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.paket-soal')->with('status', 'Paket Soal berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Delete Paket Soal
    public function destroy($id)
    {
        try {
            // Ambil data paket soal berdasarkan ID
            $paket = Paket::findOrFail($id);

            // Hapus data paket soal
            $paket->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.paket-soal')->with('status', 'Paket Soal berhasil dihapus!');
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
