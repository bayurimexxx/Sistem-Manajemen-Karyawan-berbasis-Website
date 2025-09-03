<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with('karyawan')->latest()->get();
        $karyawans = Karyawan::all();

        return view('admin.cuti', compact('cutis', 'karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'required|string'
        ]);

        Cuti::create($request->all());

        return redirect()->route('admin.cuti.index')->with('success', 'Cuti berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);
        $request->validate([
            'status' => 'required|string'
        ]);

        $cuti->update($request->all());
        return redirect()->route('admin.cuti.index')->with('success', 'Cuti berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('admin.cuti.index')->with('success', 'Cuti berhasil dihapus');
    }
}