<?php

namespace App\Http\Controllers\Api;

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
}
