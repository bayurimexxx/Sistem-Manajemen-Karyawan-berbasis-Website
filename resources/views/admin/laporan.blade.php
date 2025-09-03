@extends('admin.layout.app')

@section('content')
<div class="space-y-8 animate-fade-in">
<div class="p-6 space-y-6">
    <h2 class="text-2xl font-bold mb-6">Laporan Bulanan</h2>

    <!-- Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-green-500 text-white p-6 rounded-xl shadow">
            <h3 class="text-lg">Jumlah Karyawan</h3>
            <p class="text-3xl font-bold">{{ $totalKaryawan }}</p>
        </div>
        <div class="bg-pink-500 text-white p-6 rounded-xl shadow">
            <h3 class="text-lg">Laporan Dibuat</h3>
            <p class="text-3xl font-bold">{{ $laporanDibuat }}</p>
        </div>
    </div>

    <!-- Detail Laporan -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Detail Laporan Bulanan</h3>

<div class="flex gap-2">
    <a href="{{ route('admin.laporan.exportPdf') }}" 
       class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
       Export PDF
    </a>
    <a href="{{ route('admin.laporan.exportExcel') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
       Export Excel
    </a>
</div>

    </div>
<table class="w-full border-collapse border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Nama Karyawan</th>
            <th class="border px-4 py-2">Cuti</th>
            <th class="border px-4 py-2">Absensi</th>
            <th class="border px-4 py-2">Total Gaji</th>
        </tr>
    </thead>
    <tbody>
        @forelse($laporans as $index => $laporan)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $laporan->karyawan->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $laporan->cuti }}</td>
                <td class="border px-4 py-2">{{ $laporan->absensi }}</td>
               <td class="border px-4 py-2 font-bold text-green-600">
    Rp {{ number_format($laporan->karyawan->payrolls->sum('total_gaji'), 0, ',', '.') }}
</td>

            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4">Belum ada data laporan</td>
            </tr>
        @endforelse
    </tbody>
</table>


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
</div>
@endsection
