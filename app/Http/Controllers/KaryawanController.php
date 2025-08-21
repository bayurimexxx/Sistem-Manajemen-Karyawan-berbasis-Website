<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('admin.data_karyawan', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:karyawans,email',
            'password'      => 'required|min:6',
            'nik'           => 'required|unique:karyawans,nik',
            'jabatan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'status'        => 'required|string',
            'tanggal_masuk' => 'required|date',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        // Upload foto kalau ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('karyawan', 'public');
        }

        Karyawan::create($data);

        return redirect()->route('admin.data_karyawan')
                         ->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:karyawans,email,' . $id,
            'nik'           => 'required|unique:karyawans,nik,' . $id,
            'jabatan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'status'        => 'required|string',
            'tanggal_masuk' => 'required|date',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('karyawan', 'public');
        }

        $karyawan->update($data);

        return redirect()->route('admin.data_karyawan')
                         ->with('success', 'Karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('admin.data_karyawan')
                         ->with('success', 'Karyawan berhasil dihapus');
    }
}