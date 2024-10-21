<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Program;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SubProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function index()
    {
        // Mendapatkan data user yang sudah login
        $user = Auth::user();

        // Mengambil data teacher berdasarkan user_id dari user yang sedang login
        $teacher = Teacher::where('user_id', $user->id)->first();

        // Inisialisasi variabel untuk mata pelajaran
        $subjects = collect(); // Menggunakan koleksi kosong sebagai default

        // Mengecek apakah role_id adalah 2 (guru)
        if ($user->role_id == 2 && $teacher) {
            // Mengambil mata pelajaran berdasarkan subject_ids
            $subject_ids = json_decode($teacher->subject_ids);
            $subjects = Subject::whereIn('id', $subject_ids)->get();
        }

        // Mengambil data student berdasarkan user_id dari user yang sedang login
        $student = Student::where('user_id', $user->id)->first();

        // Mengirim data user, teacher, dan subjects ke view dashboard
        return view('dashboard', compact('user', 'teacher', 'subjects', 'student'));
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

        return view('auth.student.biostudent', compact('brands', 'programs'));
    }

    public function usertarget()
    {
        return view('student/usertarget');
    }

    public function eduschedule()
    {
        return view('student/eduschedule');
    }

    public function eduteacher()
    {
        return view('student/eduteacher');
    }

    public function edulearnrept()
    {
        return view('student/edulearningreport');
    }

    public function educenter()
    {
        return view('student/educenter/index');
    }

    public function eduassesment()
    {
        return view('student/educenter/assesment');
    }

    public function edujadwalsiswa()
    {
        return view('student/educenter/tableassesment');
    }

    public function edusoalsiswa()
    {
        return view('student/educenter/viewujian');
    }
}
