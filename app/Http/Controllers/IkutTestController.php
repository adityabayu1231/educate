<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Paket;
use App\Models\Program;
use App\Models\IkutTest;
use App\Models\TestKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IkutTestController extends Controller
{
    public function index()
    {
        $ikuttests = IkutTest::with('student', 'testKelas')->get(); // Menyertakan relasi jika diperlukan
        return view('admin.educenter.assignikutujian.index', compact('ikuttests'));
    }


    public function create()
    {
        $brands = Brand::all();
        $programs = Program::all();
        $testKelas = TestKelas::all();
        $pakets = Paket::all();

        return view('admin.educenter.assignikutujian.create', compact('brands', 'programs', 'testKelas', 'pakets'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'test_kelas_id' => 'required|exists:test_kelas,id',
            'paket_soal_id' => 'required|array',
            'paket_soal_id.*' => 'exists:pakets,id',
            'sisa_waktu' => 'nullable|integer',
            'is_selesai' => 'nullable|boolean',
        ]);

        try {
            // Simpan data dengan mengisi field secara eksplisit
            IkutTest::create([
                'student_id' => $validatedData['student_id'],
                'test_kelas_id' => $validatedData['test_kelas_id'],
                'paket_soal_id' => json_encode($validatedData['paket_soal_id']), // Mengonversi array menjadi string JSON jika perlu
                'sisa_waktu' => $validatedData['sisa_waktu'],
                'is_selesai' => $validatedData['is_selesai'] ?? false, // Default ke false jika tidak ada
            ]);

            return redirect()->route('admin.assign-soal.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangkap kesalahan dan kembalikan pesan error
            return redirect()->back()->with('error', 'Data gagal ditambahkan: ' . $e->getMessage());
        }
    }
}
