<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Program;
use App\Models\Student;
use App\Models\SubProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function index()
    {
        // Mendapatkan data user yang sudah login
        $user = Auth::user();

        // Mengambil data student berdasarkan user_id dari user yang sedang login
        $student = Student::where('user_id', $user->id)->first();

        // Mengirim data user dan student ke view dashboard
        return view('dashboard', compact('user', 'student'));
    }

    public function biostudent()
    {
        // Cek apakah role_id pengguna adalah 2 (student)
        if (Auth::user()->role_id == 2) {
            return redirect()->route('teacher.biodata'); // Mengalihkan ke halaman biodata teacher jika role_id 2
        }

        // Jika role_id bukan 2, lanjutkan ke halaman student
        $brands = Brand::all();
        $programs = Program::where('is_active', true)->get();
        $subprograms = SubProgram::all();

        return view('auth.student.biostudent', compact('brands', 'programs', 'subprograms'));
    }
}
