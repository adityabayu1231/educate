<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Student;
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

        // Cek apakah role_id adalah 1 atau 2
        if (in_array($user->role_id, [1, 2])) {
            // Cek apakah user memiliki data Student
            $student = Student::where('user_id', $user->id)->first();

            if (!$student) {
                // Redirect ke halaman pengisian profil jika data Student tidak ditemukan
                return redirect()->route('student.bio')->with('status', 'Please complete your profile.');
            }
        }

        // Lanjutkan proses jika role_id bukan 1 atau 2
        return $next($request);
    }
}
