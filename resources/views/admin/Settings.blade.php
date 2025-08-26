@extends('admin.layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Pengaturan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Profil Admin --}}
        <div class="bg-white p-6 rounded-lg shadow-md border">
            <h3 class="text-lg font-semibold mb-4">Profil Admin</h3>
            <form>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Nama</label>
                    <input type="text" class="w-full border px-3 py-2 rounded" placeholder="Nama Admin">
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Email</label>
                    <input type="email" class="w-full border px-3 py-2 rounded" placeholder="admin@example.com">
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Foto Profil</label>
                    <input type="file" class="w-full border px-3 py-2 rounded">
                </div>
                <button type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </form>
        </div>

        {{-- Ubah Password --}}
        <div class="bg-white p-6 rounded-lg shadow-md border">
            <h3 class="text-lg font-semibold mb-4">Ubah Password</h3>
            <form>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Password Lama</label>
                    <input type="password" class="w-full border px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Password Baru</label>
                    <input type="password" class="w-full border px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Konfirmasi Password</label>
                    <input type="password" class="w-full border px-3 py-2 rounded">
                </div>
                <button type="button"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Ubah Password
                </button>
            </form>
        </div>
    </div>

    {{-- Preferensi Sistem --}}
    <div class="mt-6 bg-white p-6 rounded-lg shadow-md border">
        <h3 class="text-lg font-semibold mb-4">Preferensi Sistem</h3>
        <form class="flex flex-col md:flex-row md:items-center md:space-x-6 space-y-4 md:space-y-0">
            <div class="flex-1">
                <label class="block text-sm text-gray-600">Bahasa</label>
                <select class="w-full border px-3 py-2 rounded">
                    <option>Indonesia</option>
                    <option>English</option>
                </select>
            </div>



            <div>
                <button type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan Preferensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
