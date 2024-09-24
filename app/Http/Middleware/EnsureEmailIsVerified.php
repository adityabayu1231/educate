<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna terautentikasi
        if (Auth::check()) {
            // Cek apakah email pengguna sudah diverifikasi
            if (!Auth::user()->email_verified_at) {
                // Redirect ke halaman verifikasi email jika belum diverifikasi
                return redirect()->route('verification.notice');
            }
        }

        return $next($request);
    }
}
