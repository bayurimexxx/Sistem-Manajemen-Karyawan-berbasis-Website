<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Karyawan;

class LaporanController extends Controller
{
    public function index()
    {
        // Hitung ringkasan
        $totalKaryawan = Karyawan::count();
        $totalCuti = Laporan::sum('cuti');
        $laporanDibuat = Laporan::count();

        // Ambil detail laporan dengan relasi ke karyawan
        $laporans = Laporan::with('karyawan')->get();

        return view('admin.laporan', compact('totalKaryawan', 'totalCuti', 'laporanDibuat', 'laporans'));
    }
}