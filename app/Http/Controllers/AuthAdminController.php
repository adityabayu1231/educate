<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthAdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // Jika user sudah login, cek role_id
            $roleId = Auth::user()->role_id;

            if ($roleId == 1 || $roleId == 2) {
                // Arahkan ke halaman dashboard jika role_id 1 atau 2
                return redirect()->route('dashboard');
            } else {
                // Arahkan ke dashboard admin jika role_id berbeda
                return redirect()->route('admin.dashboard');
            }
        }

        // Jika user belum login, arahkan ke halaman login
        return view('auth.admin.index');
    }

    public function repass()
    {
        return view('auth.admin.repass');
    }

    public function login(Request $request)
    {
        // Validasi input email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        try {
            // Ambil kredensial dari request
            $credentials = $request->only('email', 'password');

            // Cek apakah kredensial sesuai dengan yang ada di database
            if (Auth::attempt($credentials)) {
                // Jika login berhasil, arahkan ke dashboard admin
                return redirect()->route('admin.dashboard');
            }

            // Jika login gagal, kirim error
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        } catch (\Exception $e) {
            // Jika terjadi error lain, tangkap dan tampilkan pesan error
            return back()->withErrors([
                'error' => 'Terjadi masalah selama proses login. Silakan coba lagi.',
            ]);
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['nullable', 'string', 'max:20', 'regex:/^(?:\+62|62|0)8[1-9][0-9]{6,11}$|^(?:\+62|62|0)2[1-9][0-9]{5,9}$/'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke dashboard admin
        return redirect()->route('admin.dashboard');
    }

    // Proses logout admin
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
