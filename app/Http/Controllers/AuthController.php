<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Coba login sebagai Admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Coba login sebagai Manager
        if (Auth::guard('manager')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('manager.dashboard');
        }

        // Coba login sebagai Karyawan
        if (Auth::guard('karyawan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('karyawan.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    Auth::guard('manager')->logout();
    Auth::guard('karyawan')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home'); // kembali ke homepage
}

}