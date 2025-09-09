@extends('admin.layout.app')

@section('content')
<div class="container mx-auto p-6 animate-fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Data Karyawan</h2>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4">
        Tambah Karyawan
    </button>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white rounded border">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-3 py-2 text-left">No</th>
                    <th class="px-3 py-2">Foto</th>
                    <th class="px-3 py-2">NIK</th>
                    <th class="px-3 py-2">Nama</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Jabatan</th>
                    <th class="px-3 py-2">Tgl Lahir</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Tgl Masuk</th>
                    <th class="px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($karyawans as $index => $kar)
                <tr>
                    <td class="px-3 py-2">{{ $index+1 }}</td>
                    <td class="px-3 py-2">
                        @if($kar->foto)
                            <img src="{{ asset('storage/'.$kar->foto) }}" class="w-8 h-8 rounded-full object-cover">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-3 py-2">{{ $kar->nik }}</td>
                    <td class="px-3 py-2">{{ $kar->name }}</td>
                    <td class="px-3 py-2">{{ $kar->email }}</td>
                    <td class="px-3 py-2">{{ $kar->jabatan }}</td>
                    <td class="px-3 py-2">{{ $kar->tanggal_lahir }}</td>
                    <td class="px-3 py-2">
                        <span class="{{ $kar->status == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $kar->status }}
                        </span>
                    </td>
                    <td class="px-3 py-2">{{ $kar->tanggal_masuk }}</td>
                    <td class="px-3 py-2 flex gap-1">
                        {{-- Edit --}}
                        <button onclick="document.getElementById('modalEdit{{ $kar->id }}').classList.remove('hidden')"
                            class="bg-yellow-400 text-white px-2 py-1 rounded">✏️</button>

                        {{-- Hapus --}}
                        <form action="{{ route('admin.data_karyawan.destroy',$kar->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">🗑</button>
                        </form>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div id="modalEdit{{ $kar->id }}" class="hidden fixed inset-0 bg-black/30 flex items-center justify-center z-50">
                    <div class="bg-white rounded w-full max-w-md p-5">
                        <h3 class="text-lg font-bold mb-3">Edit Karyawan</h3>
                        <form action="{{ route('admin.data_karyawan.update',$kar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="space-y-2">
                                <input type="text" name="name" value="{{ $kar->name }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="email" name="email" value="{{ $kar->email }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full border px-3 py-2 rounded">
                                <input type="text" name="nik" value="{{ $kar->nik }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="text" name="jabatan" value="{{ $kar->jabatan }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="date" name="tanggal_lahir" value="{{ $kar->tanggal_lahir }}" class="w-full border px-3 py-2 rounded" required>
                                <select name="status" class="w-full border px-3 py-2 rounded">
                                    <option value="Aktif" {{ $kar->status=="Aktif"?'selected':'' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $kar->status=="Tidak Aktif"?'selected':'' }}>Tidak Aktif</option>
                                </select>
                                <input type="date" name="tanggal_masuk" value="{{ $kar->tanggal_masuk }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
                            </div>
                            <div class="mt-4 flex justify-end gap-2">
                                <button type="button" onclick="document.getElementById('modalEdit{{ $kar->id }}').classList.add('hidden')"
                                    class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modalTambah" class="hidden fixed inset-0 bg-black/30 flex items-center justify-center z-50">
    <div class="bg-white rounded w-full max-w-md p-5">
        <h3 class="text-lg font-bold mb-3">Tambah Karyawan</h3>
        <form action="{{ route('admin.data_karyawan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-2">
                <input type="text" name="name" placeholder="Nama" class="w-full border px-3 py-2 rounded" required>
                <input type="email" name="email" placeholder="Email" class="w-full border px-3 py-2 rounded" required>
                <input type="password" name="password" placeholder="Password" class="w-full border px-3 py-2 rounded" required>
                <input type="text" name="nik" placeholder="NIK" class="w-full border px-3 py-2 rounded" required>
                <input type="text" name="jabatan" placeholder="Jabatan" class="w-full border px-3 py-2 rounded" required>
                <input type="date" name="tanggal_lahir" class="w-full border px-3 py-2 rounded" required>
                <select name="status" class="w-full border px-3 py-2 rounded">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
                <input type="date" name="tanggal_masuk" class="w-full border px-3 py-2 rounded" required>
                <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Animasi --}}
<style>
@keyframes fadeIn { from {opacity:0;} to {opacity:1;} }
.animate-fade-in { animation: fadeIn 0.3s ease-out; }
</style>
@endsection
