@extends('admin.layout.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Absensi & Cuti</h2>

    <!-- Ringkasan -->
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-green-500 text-white p-6 rounded-lg shadow">
            <h3 class="text-lg">Jumlah Kehadiran</h3>
            <p class="text-3xl font-bold">{{ $jumlahHadir }}</p>
        </div>
        <div class="bg-emerald-400 text-white p-6 rounded-lg shadow">
            <h3 class="text-lg">Pengajuan Cuti</h3>
            <p class="text-3xl font-bold">{{ $jumlahCuti }}</p>
        </div>
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
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
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Tambah Absensi
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
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Hapus
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
@endsection
