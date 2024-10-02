<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStudentProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Cek apakah role_id adalah 1 (siswa) atau 2 (guru)
        if ($user->role_id == 1) {
            // Cek apakah user memiliki data Student (siswa)
            $student = Student::where('user_id', $user->id)->first();

            if (!$student) {
                // Redirect ke halaman pengisian profil jika data Student tidak ditemukan
                return redirect()->route('student.bio')->with('status', 'Please complete your student profile.');
            }
        } elseif ($user->role_id == 2) {
            // Cek apakah user memiliki data Teacher (guru)
            $teacher = Teacher::where('user_id', $user->id)->first();

            if (!$teacher) {
                // Redirect ke halaman pengisian profil jika data Teacher tidak ditemukan
                return redirect()->route('teacher.bio')->with('status', 'Please complete your teacher profile.');
            }
        }

        // Lanjutkan proses jika role_id adalah 1 atau 2, dan profil sudah lengkap
        return $next($request);
    }
}
