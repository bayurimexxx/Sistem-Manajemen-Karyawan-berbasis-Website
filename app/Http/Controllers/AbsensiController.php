<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;

class AbsensiController extends Controller
{
   public function index()
{
    $absensis = Absensi::with('karyawan')->get();
    $karyawans = Karyawan::all();

    // Hitung ringkasan absensi
    $jumlahHadir = Absensi::where('status', 'Hadir')->count();
    $jumlahCuti = Absensi::where('status', 'Cuti')->count();
    $jumlahIzinSakit = Absensi::whereIn('status', ['Izin', 'Sakit'])->count();

    return view('admin.absensi', compact(
        'absensis',
        'karyawans',
        'jumlahHadir',
        'jumlahCuti',
        'jumlahIzinSakit'
    ));
}


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()->route('admin.absensi.index')->with('success', 'Absensi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'status' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $absensi->update($request->all());

        return redirect()->route('admin.absensi.index')->with('success', 'Absensi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('admin.absensi.index')->with('success', 'Absensi berhasil dihapus');
    }
}