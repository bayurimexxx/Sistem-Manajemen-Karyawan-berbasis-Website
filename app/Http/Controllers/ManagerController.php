<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('admin.data_manager', compact('managers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:managers,email',
            'password'      => 'required|min:6',
            'nik'           => 'required|unique:managers,nik',
            'jabatan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'status'        => 'required|string',
            'tanggal_masuk' => 'required|date',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $validated;
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('manager', 'public');
        }

        Manager::create($data);

        return redirect()->route('admin.data_manager')
                         ->with('success', 'Manager berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $manager = Manager::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:managers,email,' . $id,
            'nik'           => 'required|unique:managers,nik,' . $id,
            'jabatan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'status'        => 'required|string',
            'tanggal_masuk' => 'required|date',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $validated;
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('manager', 'public');
        }

        $manager->update($data);

        return redirect()->route('admin.data_manager')
                         ->with('success', 'Manager berhasil diperbarui');
    }

    public function destroy($id)
    {
        $manager = Manager::findOrFail($id);
        $manager->delete();

        return redirect()->route('admin.data_manager')
                         ->with('success', 'Manager berhasil dihapus');
    }

    
}