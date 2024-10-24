<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\SubProgram;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class SubProgramController extends Controller
{
    public function index(): JsonResponse
    {
        // Ambil semua data subprogram
        $subprograms = SubProgram::all();

        // Kembalikan data dalam format JSON
        return response()->json($subprograms);
    }

    // Fungsi untuk mencari subprogram berdasarkan brand_id dan program_id
    public function search(Request $request): JsonResponse
    {
        // Ambil query parameters untuk brand_id dan program_id
        $brandId = $request->query('brand_id');
        $programId = $request->query('program_id');

        // Query berdasarkan brand_id dan program_id jika keduanya diberikan
        $query = SubProgram::query();

        if ($brandId) {
            $query->where('brand_id', $brandId);
        }

        if ($programId) {
            $query->where('program_id', $programId);
        }

        // Ambil data yang difilter
        $subprograms = $query->get();

        // Kembalikan data dalam format JSON
        return response()->json($subprograms);
    }

    public function getStudents(Kelas $kelas): JsonResponse
    {
        // Ambil siswa yang memiliki program_id, sub_program_id, dan brand_id yang sama dengan kelas
        $students = Student::where('program_id', $kelas->program_id)
            ->where('sub_program_id', $kelas->sub_program_id) // Menggunakan sub_program_id, bukan subprogram_id
            ->where('brand_id', $kelas->brand_id)
            ->whereNull('class_id') // Pastikan siswa belum memiliki class_id
            ->with('user') // Menyertakan relasi user jika diperlukan
            ->get();

        return response()->json($students);
    }
}
