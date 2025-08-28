<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan;
use App\Models\Payroll;
use Illuminate\Support\Facades\Schema;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;

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
        $totalKaryawan = Karyawan::count();

        // default jika tabel payrolls belum ada
        $payrolls = collect();
        $totalGaji = 0;
        $sudahDibayar = 0;

        if (Schema::hasTable('payrolls')) {
            $payrolls = Payroll::with('karyawan')->latest()->get();
            // jika kolom total_gaji ada, pakai itu. jika belum, hitung manual:
            $totalGaji = $payrolls->sum(function ($p) {
                return $p->total_gaji ?? (($p->gaji_pokok ?? 0) + ($p->tunjangan ?? 0) - ($p->potongan ?? 0));
            });
            $sudahDibayar = $payrolls->where('status', 'Dibayar')->count();
        }

        return view('admin.payroll', compact('totalKaryawan', 'totalGaji', 'sudahDibayar', 'payrolls'));
    }

    public function laporan()
    {
        $totalKaryawan = Karyawan::count();
        $totalCuti      = Laporan::sum('cuti');
        $laporanDibuat  = Laporan::count();

        $laporans = Laporan::with('karyawan')->get();

        return view('admin.laporan', compact(
            'totalKaryawan', 'totalCuti', 'laporanDibuat', 'laporans'
        ));
    }

   public function settings()
{
    return view('admin.settings'); // file Blade: resources/views/admin/settings.blade.php
}

}