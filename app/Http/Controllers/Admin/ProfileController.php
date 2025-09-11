<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validasi input
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:admins,email,' . $admin->id,
            'new_password' => 'nullable|min:6|confirmed',
            'foto'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update nama & email
        $admin->name  = $request->name;
        $admin->email = $request->email;

        // Update password jika ada input
        if ($request->filled('new_password')) {
            $admin->password = Hash::make($request->new_password);
        }

        // Update foto jika ada upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($admin->foto && file_exists(public_path($admin->foto))) {
                unlink(public_path($admin->foto));
            }

            // Nama file unik
            $filename = time() . '.' . $request->foto->extension();

            // Pindahkan ke folder public/admin
            $request->foto->move(public_path('admin'), $filename);

            // Simpan path ke database (misalnya "admin/namafile.jpg")
            $admin->foto = 'admin/' . $filename;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}