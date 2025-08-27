@extends('admin.layout.app')

@section('title', 'Laporan')

@section('content')
<div class="space-y-8 animate-fade-in">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800 tracking-wide">📊 Laporan Bulanan</h1>
        <button class="px-5 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:opacity-90 text-white rounded-lg shadow-lg transition">
            ⬇ Export PDF
        </button>
    </div>

    <!-- Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition">
            <h3 class="text-lg">Jumlah Karyawan</h3>
            <p class="text-3xl font-bold">120</p>
        </div>
        <div class="bg-gradient-to-r from-cyan-400 to-cyan-600 text-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition">
            <h3 class="text-lg">Total Cuti</h3>
            <p class="text-3xl font-bold">35</p>
        </div>
        <div class="bg-gradient-to-r from-pink-400 to-pink-600 text-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition">
            <h3 class="text-lg">Laporan Dibuat</h3>
            <p class="text-3xl font-bold">12</p>
        </div>
    </div>

    <!-- Tabel -->
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Detail Laporan Bulanan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="text-gray-600">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Karyawan</th>
                        <th class="px-4 py-2 text-left">Cuti</th>
                        <th class="px-4 py-2 text-left">Absensi</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('laporanChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                {
                    label: 'Cuti',
                    data: [5, 7, 4, 6, 8, 3],
                    backgroundColor: 'rgba(239, 68, 68, 0.7)', // merah
                    borderRadius: 8
                },
                {
                    label: 'Absensi (%)',
                    data: [95, 96, 92, 97, 93, 90],
                    backgroundColor: 'rgba(37, 99, 235, 0.7)', // biru
                    borderRadius: 8
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 10 }
                }
            }
        }
    });
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
