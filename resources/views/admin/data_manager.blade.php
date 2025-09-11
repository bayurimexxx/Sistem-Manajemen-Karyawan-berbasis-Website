@extends('admin.layout.app')

@section('content')
<div class="space-y-8 animate-fade-in">
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Data Manager</h2>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error messages --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
         class="bg-gradient-to-r from-[#2f4858] to-[#007b89] 
         hover:from-[#007b89] hover:to-[#2f4858] 
         text-white px-4 py-2 rounded mb-4 transition duration-300">
        Tambah manager
    </button>

    {{-- Tabel --}}
    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2">No</th>
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
            <tbody>
                @foreach($managers as $index => $mng)
                <tr class="border-b">
                    <td class="px-3 py-2">{{ $index+1 }}</td>
                    <td class="px-3 py-2">
                        @if($mng->foto)
                            <img src="{{ asset('storage/'.$mng->foto) }}" class="w-10 h-10 rounded">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="px-3 py-2">{{ $mng->nik }}</td>
                    <td class="px-3 py-2">{{ $mng->name }}</td>
                    <td class="px-3 py-2">{{ $mng->email }}</td>
                    <td class="px-3 py-2">{{ $mng->jabatan }}</td>
                    <td class="px-3 py-2">{{ $mng->tanggal_lahir }}</td>
                    <td class="px-3 py-2">{{ $mng->status }}</td>
                    <td class="px-3 py-2">{{ $mng->tanggal_masuk }}</td>

                    {{-- Tombol Aksi --}}
                    <td class="px-3 py-2">
                        <div class="flex items-center justify-center space-x-2">
                            {{-- Tombol Edit --}}
                            <button onclick="document.getElementById('modalEdit{{ $mng->id }}').classList.remove('hidden')"
                                class="px-3 py-2 rounded flex items-center space-x-1 
                                       border border-yellow-500 text-yellow-500 
                                       hover:bg-yellow-500 hover:text-white transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.587l-4.243.707.707-4.243L16.862 3.487z" />
                                </svg>
                                <span>Edit</span>
                            </button>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.data_manager.destroy',$mng->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf @method('DELETE')
                                <button 
                                    class="px-3 py-2 rounded flex items-center space-x-1
                                           border border-red-500 text-red-500
                                           hover:bg-red-500 hover:text-white transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h10" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div id="modalEdit{{ $mng->id }}" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
                    <div class="bg-white rounded-lg w-96 p-6">
                        <h3 class="text-lg font-bold mb-4">Edit manager</h3>
                        <form action="{{ route('admin.data_manager.update',$mng->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="space-y-2">
                                <input type="text" name="name" value="{{ $mng->name }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="email" name="email" value="{{ $mng->email }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full border px-3 py-2 rounded">
                                <input type="text" name="nik" value="{{ $mng->nik }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="text" name="jabatan" value="{{ $mng->jabatan }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="date" name="tanggal_lahir" value="{{ $mng->tanggal_lahir }}" class="w-full border px-3 py-2 rounded" required>
                                <select name="status" class="w-full border px-3 py-2 rounded">
                                    <option value="Aktif" {{ $mng->status=="Aktif"?'selected':'' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $mng->status=="Tidak Aktif"?'selected':'' }}>Tidak Aktif</option>
                                </select>
                                <input type="date" name="tanggal_masuk" value="{{ $mng->tanggal_masuk }}" class="w-full border px-3 py-2 rounded" required>
                                <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
                            </div>
                            <div class="mt-4 flex justify-end space-x-2">
                                <button type="button" onclick="document.getElementById('modalEdit{{ $mng->id }}').classList.add('hidden')"
                                    class="bg-gray-400 px-3 py-1 rounded">Batal</button>
                                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Simpan</button>
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
<div id="modalTambah" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-96 p-6">
        <h3 class="text-lg font-bold mb-4">Tambah manager</h3>
        <form action="{{ route('admin.data_manager.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="mt-4 flex justify-end space-x-2">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="bg-gray-400 px-3 py-1 rounded">Batal</button>
                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fadeIn 0.6s ease-out;
}
</style>
@endsection
