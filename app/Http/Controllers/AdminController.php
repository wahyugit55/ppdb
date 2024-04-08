<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Coba autentikasi pengguna
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Jika berhasil, redirect ke dashboard atau halaman lain
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        // Setelah menyimpan data pengguna
        session()->flash('registration_failed', 'Login Gagal, periksa email dan password anda !');

        // Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
}
