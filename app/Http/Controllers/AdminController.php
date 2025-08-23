<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
{
    $jumlahKaryawan = Karyawan::count(); // ambil jumlah karyawan dari database
    return view('admin.dashboard', compact('jumlahKaryawan'));
}

    public function absensi()
    {
        return view('admin.absensi');
    }

    public function payroll()
    {
        return view('admin.payroll');
    }

    public function laporan()
    {
        return view('admin.laporan');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}