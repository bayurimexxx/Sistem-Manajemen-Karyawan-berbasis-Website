@extends('admin.layout.app')

@section('content')
<div class="space-y-8 animate-fade-in">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Payroll</h2>

        <!-- Ringkasan Gaji Bulanan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition">
                <h3 class="text-lg">Jumlah Karyawan</h3>
                <p class="text-3xl font-bold">{{ $totalKaryawan }}</p>
            </div>
            <div class="bg-green-400 text-white rounded-xl p-6 shadow">
                <p class="text-2xl font-bold">Rp {{ number_format($totalGaji, 0, ',', '.') }}</p>
                <p>Total Gaji Dibayarkan</p>
            </div>
            <div class="bg-blue-400 text-white rounded-xl p-6 shadow">
                <p class="text-2xl font-bold">{{ $sudahDibayar }}</p>
                <p>Sudah Dibayar</p>
            </div>
        </div>

        <!-- Data Payroll -->
        <div class="bg-white rounded-xl shadow p-4">
            <div class="flex justify-between mb-4">
                <h3 class="text-xl font-semibold">Data Payroll</h3>
                <button onclick="openModal()" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    + Tambah Payroll
                </button>
            </div>

            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 p-2">No</th>
                        <th class="border border-gray-300 p-2">Nama Karyawan</th>
                        <th class="border border-gray-300 p-2">Jabatan</th>
                        <th class="border border-gray-300 p-2">Gaji Pokok</th>
                        <th class="border border-gray-300 p-2">Tunjangan</th>
                        <th class="border border-gray-300 p-2">Potongan</th>
                        <th class="border border-gray-300 p-2">Total Gaji</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payrolls as $index => $payroll)
                        <tr>
                            <td class="border p-2">{{ $index+1 }}</td>
                            <td class="border p-2">{{ $payroll->karyawan->name ?? '-' }}</td>
                            <td class="border p-2">{{ $payroll->karyawan->jabatan ?? '-' }}</td>
                            <td class="border p-2">Rp {{ number_format($payroll->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="border p-2">Rp {{ number_format($payroll->tunjangan, 0, ',', '.') }}</td>
                            <td class="border p-2">Rp {{ number_format($payroll->potongan, 0, ',', '.') }}</td>
                            <td class="border p-2 font-bold">Rp {{ number_format($payroll->total_gaji, 0, ',', '.') }}</td>
                            <td class="border p-2">
                                <form action="{{ route('admin.payroll.destroy', $payroll->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center p-4">Belum ada data payroll</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="payrollModal" 
     class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-4">Tambah Payroll</h3>
        <form action="{{ route('admin.payroll.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Nama Karyawan</label>
                <select name="karyawan_id" class="w-full border px-3 py-2 rounded" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}">{{ $karyawan->name }} - {{ $karyawan->jabatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Gaji Pokok</label>
                <input type="number" name="gaji_pokok" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Tunjangan</label>
                <input type="number" name="tunjangan" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Potongan</label>
                <input type="number" name="potongan" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Periode</label>
                <input type="date" name="periode" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Status</label>
                <select name="status" class="w-full border px-3 py-2 rounded" required>
                    <option value="Dibayar">Dibayar</option>
                    <option value="Belum Dibayar">Belum Dibayar</option>
                </select>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" 
                        class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('payrollModal').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('payrollModal').classList.add('hidden');
}
</script>

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
