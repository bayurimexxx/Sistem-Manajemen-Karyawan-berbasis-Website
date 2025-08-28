<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with('karyawan')->get();

        $totalKaryawan = Karyawan::count();
        $totalCuti = $laporans->sum('cuti');
        $totalAbsensi = $laporans->sum('absensi');
        $laporanDibuat = $laporans->count();

        return view('admin.laporan', compact(
            'laporans',
            'totalKaryawan',
            'totalCuti',
            'totalAbsensi',
            'laporanDibuat'
        ));
    }
    public function exportPdf()
    {
        $laporans = Laporan::with('karyawan')->get();

        $pdf = Pdf::loadView('admin.laporan_pdf', compact('laporans'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-bulanan.pdf');
    }
}