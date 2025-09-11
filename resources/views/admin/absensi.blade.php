@extends('admin.layout.app')

@section('content')
<div class="space-y-8 animate-fade-in">
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Absensi</h2>

    <!-- Ringkasan -->
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-[#007b89] text-white p-6 rounded-lg shadow">
            <h3 class="text-lg">Jumlah Kehadiran</h3>
            <p class="text-3xl font-bold">{{ $jumlahHadir }}</p>
        </div>
        <div class="bg-[#2f4858] text-white p-6 rounded-lg shadow">
            <h3 class="text-lg">Izin & Sakit</h3>
            <p class="text-3xl font-bold">{{ $jumlahIzinSakit }}</p>
        </div>
    </div>

    <!-- Daftar Absensi -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between mb-4">
            <h3 class="font-bold text-lg">Daftar Absensi</h3>
            
            <!-- Tombol buka modal -->
            <button onclick="document.getElementById('modal-absensi').classList.remove('hidden')"
                 class="bg-gradient-to-r from-[#2f4858] to-[#007b89] 
         hover:bg-gradient-to-r hover:from-[#007b89] hover:to-[#2f4858] 
         text-white px-4 py-2 rounded mb-4 transition duration-300">
                Tambah Absensi
            </button>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Keterangan</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($absensis as $absensi)
                    <tr>
                        <td class="border px-4 py-2">{{ $absensi->karyawan->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $absensi->tanggal }}</td>
                        <td class="border px-4 py-2">{{ $absensi->status }}</td>
                        <td class="border px-4 py-2">{{ $absensi->keterangan ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('admin.absensi.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button 
        class="px-3 py-2 rounded flex items-center space-x-1
               border border-red-500 text-red-500
               hover:bg-red-500 hover:text-white transition duration-300">
        <!-- Icon Tempat Sampah Outline -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h10" />
        </svg>
        <span>Delete</span>
    </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">Belum ada data absensi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Absensi -->
<div id="modal-absensi" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <h3 class="text-xl font-bold mb-4">Tambah Absensi</h3>

        <form action="{{ route('admin.absensi.store') }}" method="POST">
            @csrf

            <!-- Pilih Karyawan -->
            <div class="mb-4">
                <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Karyawan</label>
                <select name="karyawan_id" id="karyawan_id" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>
                            {{ $karyawan->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal -->
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status Kehadiran</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Izin"  {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                    <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="Alpa"  {{ old('status') == 'Alpa' ? 'selected' : '' }}>Alpa</option>
                </select>
            </div>

            <!-- Keterangan -->
            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan (Opsional)</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Tambahkan keterangan jika diperlukan">{{ old('keterangan') }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="document.getElementById('modal-absensi').classList.add('hidden')"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
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
