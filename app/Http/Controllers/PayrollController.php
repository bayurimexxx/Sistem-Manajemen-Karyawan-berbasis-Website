<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Karyawan;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('karyawan')->get();
        $karyawans = Karyawan::all();

        // Hitung ringkasan
        $totalKaryawan = $karyawans->count();
        $totalGajiDibayar = $payrolls->where('status', 'Dibayar')->sum('total_gaji');
        $sudahDibayar     = $payrolls->where('status', 'Dibayar')->count();


       return view('admin.payroll', compact(
    'payrolls',
    'karyawans',
    'totalKaryawan',
    'totalGajiDibayar',
    'sudahDibayar'
));

    }
public function update(Request $request, $id)
{
    $request->validate([
        'karyawan_id' => 'required|exists:karyawans,id',
        'gaji_pokok' => 'required|numeric',
        'tunjangan'  => 'required|numeric',
        'potongan'   => 'required|numeric',
        'periode'    => 'required|date',
        'status'     => 'required|in:Dibayar,Belum Dibayar',
    ]);

    $totalGaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;

    $payroll = Payroll::findOrFail($id);
    $payroll->update([
        'karyawan_id' => $request->karyawan_id,
        'gaji_pokok'  => $request->gaji_pokok,
        'tunjangan'   => $request->tunjangan,
        'potongan'    => $request->potongan,
        'total_gaji'  => $totalGaji,
        'periode'     => $request->periode,
        'status'      => $request->status,
    ]);

    return redirect()->route('admin.payroll.index')->with('success', 'Data payroll berhasil diperbarui');
}

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'gaji_pokok' => 'required|numeric',
            'tunjangan'  => 'required|numeric',
            'potongan'   => 'required|numeric',
            'periode'    => 'required',
            'status'     => 'required|in:Dibayar,Belum Dibayar',
        ]);

        $totalGaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Payroll::create([
            'karyawan_id' => $request->karyawan_id,
            'gaji_pokok'  => $request->gaji_pokok,
            'tunjangan'   => $request->tunjangan,
            'potongan'    => $request->potongan,
            'total_gaji'  => $totalGaji,
            'periode'     => $request->periode,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.payroll.index')->with('success', 'Data payroll berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete();

        return redirect()->route('admin.payroll.index')->with('success', 'Data payroll berhasil dihapus');
    }
}