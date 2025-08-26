@extends('admin.layout.app')

@section('content')
<div class="container mx-auto p-6 animate-fade-in">
    <h2 class="text-3xl font-bold mb-6 text-gray-800 flex items-center gap-2">
        👥 Data Karyawan
    </h2>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 shadow">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Error messages --}}
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-4 shadow">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
        class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:opacity-90 text-white px-5 py-2 rounded-lg shadow flex items-center gap-2 mb-4 transition">
        ➕ Tambah Karyawan
    </button>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg border">
        <table class="min-w-full text-sm">
            <thead class="bg-gradient-to-r from-gray-700 to-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3">Foto</th>
                    <th class="px-4 py-3">NIK</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Jabatan</th>
                    <th class="px-4 py-3">Tgl Lahir</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tgl Masuk</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($karyawans as $index => $kar)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2">{{ $index+1 }}</td>
                    <td class="px-4 py-2">
                        @if($kar->foto)
                            <img src="{{ asset('storage/'.$kar->foto) }}" class="w-10 h-10 rounded-full shadow">
                        @else
                            <span class="text-gray-400 italic">No Foto</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $kar->nik }}</td>
                    <td class="px-4 py-2 font-medium">{{ $kar->name }}</td>
                    <td class="px-4 py-2">{{ $kar->email }}</td>
                    <td class="px-4 py-2">{{ $kar->jabatan }}</td>
                    <td class="px-4 py-2">{{ $kar->tanggal_lahir }}</td>
                    <td class="px-4 py-2">
                        <span class="px-3 py-1 text-xs rounded-full 
                            {{ $kar->status == 'Aktif' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            {{ $kar->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ $kar->tanggal_masuk }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        {{-- Tombol Edit --}}
                        <button onclick="document.getElementById('modalEdit{{ $kar->id }}').classList.remove('hidden')"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow transition">✏️</button>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.data_karyawan.destroy',$kar->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow transition">🗑</button>
                        </form>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div id="modalEdit{{ $kar->id }}" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-xl w-96 p-6 shadow-lg transform scale-95 transition-all">
                        <h3 class="text-xl font-bold mb-4">✏️ Edit Karyawan</h3>
                        <form action="{{ route('admin.data_karyawan.update',$kar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="space-y-3">
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
                                    class="bg-gray-400 hover:bg-gray-500 px-4 py-2 rounded text-white">Batal</button>
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">Simpan</button>
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
<div id="modalTambah" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-96 p-6 shadow-lg transform scale-95 transition-all">
        <h3 class="text-xl font-bold mb-4">➕ Tambah Karyawan</h3>
        <form action="{{ route('admin.data_karyawan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-3">
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
                    class="bg-gray-400 hover:bg-gray-500 px-4 py-2 rounded text-white">Batal</button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Animasi Fade In --}}
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(15px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fadeIn 0.5s ease-out;
}
</style>
@endsection
