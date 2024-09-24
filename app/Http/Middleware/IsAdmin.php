<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mengecek apakah pengguna sudah login
        if (!Auth::check()) {
            // Jika belum login, arahkan ke halaman login admin
            return redirect()->route('admin.index')->with('error', 'Silakan login terlebih dahulu.');
        }
        // Mengecek apakah pengguna memiliki role_id 1 atau 2, yang dilarang akses
        if (in_array(Auth::user()->role_id, [1, 2])) {
            // Redirect ke halaman admin dengan pesan error
            return redirect()->route('admin.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        // Jika sudah login dan terverifikasi, lanjutkan permintaan
        return $next($request);
    }
}
