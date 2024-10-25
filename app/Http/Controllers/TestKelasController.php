<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\TestKelas;
use Illuminate\Http\Request;

class TestKelasController extends Controller
{
    public function index()
    {
        // Ambil semua data Test Kelas dari database
        $testKelas = TestKelas::all();

        // Return view dengan data Test Kelas
        return view('admin.educenter.assignujian.index', compact('testKelas'));
    }

    public function create()
    {
        $kelass = Kelas::all();
        return view('admin.educenter.assignujian.create', compact('kelass'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_sesi' => 'required|integer',
            'nama_test' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'teknis_ujian' => 'required|string|max:255',
            'mulai_test' => 'required|date',
            'selesai_test' => 'required|date|after:mulai_test',
            'jadwal_webinar' => 'nullable|string|max:255',
            'id_jadwal_learning' => 'nullable|string|max:255',
            'passing_grade' => 'nullable|numeric|min:0|max:100',
        ]);

        try {
            // Buat instance TestKelas
            $testKelas = new TestKelas();
            $testKelas->id_sesi = $request->id_sesi;
            $testKelas->nama_test = $request->nama_test;
            $testKelas->jenis = $request->jenis;
            $testKelas->teknis_ujian = $request->teknis_ujian;
            $testKelas->mulai_test = $request->mulai_test;
            $testKelas->selesai_test = $request->selesai_test;
            $testKelas->jadwal_webinar = $request->jadwal_webinar;
            $testKelas->id_jadwal_learning = $request->id_jadwal_learning;
            $testKelas->passing_grade = $request->passing_grade;

            // Simpan ke database
            $testKelas->save();

            return redirect()->route('admin.test-kelas.index')->with('success', 'Test Kelas berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan Test Kelas: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $testKelas = TestKelas::findOrFail($id);

        return view('admin.test-kelas.edit', compact('testKelas'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_sesi' => 'required|integer',
            'nama_test' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'teknis_ujian' => 'required|string|max:255',
            'mulai_test' => 'required|date',
            'selesai_test' => 'required|date|after:mulai_test',
            'jadwal_webinar' => 'nullable|string|max:255',
            'id_jadwal_learning' => 'nullable|string|max:255',
            'passing_grade' => 'required|numeric|min:0|max:100',
        ]);

        try {
            $testKelas = TestKelas::findOrFail($id);
            $testKelas->update($validatedData);

            return redirect()->route('admin.test-kelas.index')->with('success', 'Test Kelas berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $testKelas = TestKelas::findOrFail($id);
            $testKelas->delete(); // Menghapus data menggunakan SoftDeletes

            return redirect()->route('admin.test-kelas.index')->with('success', 'Test Kelas berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menghapus data.');
        }
    }
}
