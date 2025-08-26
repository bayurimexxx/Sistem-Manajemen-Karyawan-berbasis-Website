@extends('admin.layout.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Laporan Absensi & Cuti</h2>

    <!-- Filter Laporan -->
    <div class="mb-6 bg-white shadow rounded-lg p-4">
        <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                <input type="date" name="start_date" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                <input type="date" name="end_date" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Tampilkan
                </button>
            </div>
        </form>
    </div>

    <!-- Tabel Laporan -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-4 py-2 border text-left text-sm font-semibold text-gray-600">Nama</th>
                    <th class="px-4 py-2 border text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="px-4 py-2 border text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-2 border text-left text-sm font-semibold text-gray-600">Keterangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <tr>
                    <td class="px-4 py-2 border">1</td>
                    <td class="px-4 py-2 border">Budi Adian</td>
                    <td class="px-4 py-2 border">2025-08-24</td>
                    <td class="px-4 py-2 border text-green-600 font-medium">Hadir</td>
                    <td class="px-4 py-2 border">-</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">2</td>
                    <td class="px-4 py-2 border">Andi Saputra</td>
                    <td class="px-4 py-2 border">2025-08-24</td>
                    <td class="px-4 py-2 border text-red-600 font-medium">Cuti</td>
                    <td class="px-4 py-2 border">Acara Keluarga</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tombol Ekspor -->
    <div class="mt-6 flex space-x-3">
        <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Export Excel</button>
        <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Export PDF</button>
    </div>
</div>
@endsection
