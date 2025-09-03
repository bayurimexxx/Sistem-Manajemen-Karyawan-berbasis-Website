<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Cuti;
use App\Models\Laporan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
{
    $totalKaryawan = Karyawan::count();

    // Hitung cuti berdasarkan status
    $totalCutiPending = Cuti::where('status', 'pending')->count();
    $totalCutiDisetujui = Cuti::where('status', 'disetujui')->count();

    // Ambil data bulanan (6 bulan terakhir)
    $bulan = [];
    $cutiPendingBulanan = [];
    $cutiDisetujuiBulanan = [];

    for ($i = 5; $i >= 0; $i--) {
        $month = Carbon::now()->subMonths($i);

        $bulan[] = $month->format('M');

        $cutiPendingBulanan[] = Cuti::whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->where('status', 'pending')
            ->count();

        $cutiDisetujuiBulanan[] = Cuti::whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->where('status', 'disetujui')
            ->count();
    }

    return view('admin.dashboard', compact(
        'totalKaryawan',
        'totalCutiPending',
        'totalCutiDisetujui',
        'bulan',
        'cutiPendingBulanan',
        'cutiDisetujuiBulanan'
    ));
}

}