<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubProgramController;
use App\Http\Controllers\KelasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk mendapatkan semua subprogram
Route::get('/subprograms', [SubProgramController::class, 'index']);

// Route untuk mencari subprogram berdasarkan brand_id dan program_id
Route::get('/subprograms/search', [SubProgramController::class, 'search']);

Route::get('/datasiswa', [SubProgramController::class, 'dataSiswa']);

Route::get('/kelas/{kelas}/students', [SubProgramController::class, 'getStudents']);
