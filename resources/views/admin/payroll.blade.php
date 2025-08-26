@extends('admin.layout.app')

@section('content')
<div class="space-y-8 animate-fade-in">
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Payroll</h2>

    <!-- Ringkasan Gaji Bulanan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-green-500 text-white rounded-xl p-6 shadow">
            <p class="text-4xl font-bold">120</p>
            <p>Karyawan</p>
        </div>
        <div class="bg-green-400 text-white rounded-xl p-6 shadow">
            <p class="text-2xl font-bold">Rp 450.000.000</p>
            <p>Total Gaji Dibayarkan</p>
        </div>
        <div class="bg-blue-400 text-white rounded-xl p-6 shadow">
            <p class="text-2xl font-bold">15</p>
            <p>Sudah Dibayar</p>
        </div>
    </div>

    <!-- Data Payroll -->
    <div class="bg-white rounded-xl shadow p-4">
        <h3 class="text-xl font-semibold mb-4">Data Payroll</h3>
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
                
            </tbody>
        </table>
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
