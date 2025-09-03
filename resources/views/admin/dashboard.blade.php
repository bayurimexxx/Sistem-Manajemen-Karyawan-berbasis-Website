@extends('admin.layout.app')

@section('content')
<div class="container mx-auto p-6 animate-fade-in">
<div class="p-6 space-y-8">

    <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

   <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-lg">Jumlah Karyawan</h3>
        <p class="text-3xl font-bold">{{ $totalKaryawan }}</p>
    </div>

    <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-lg">Jumlah Pengajuan Cuti (Pending)</h3>
        <p class="text-3xl font-bold">{{ $totalCutiPending }}</p>
    </div>

    <div class="bg-gradient-to-r from-indigo-400 to-indigo-600 text-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-lg">Karyawan Sedang Cuti (Disetujui)</h3>
        <p class="text-3xl font-bold">{{ $totalCutiDisetujui }}</p>
    </div>

</div>

</div>


 <!-- Statistik Bulanan -->
<div class="bg-white rounded-2xl shadow p-6 mt-8">
    <h3 class="text-xl font-semibold mb-4">Statistik Bulanan</h3>
    <div style="height: 400px;"> <!-- wrapper untuk kontrol tinggi -->
        <canvas id="chartStatistik"></canvas>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Hapus chart lama kalau ada (mencegah duplikasi saat reload partial)
    if (window.myChart) {
        window.myChart.destroy();
    }

    const ctx = document.getElementById('chartStatistik').getContext('2d');
    window.myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($bulan), 
            datasets: [
                {
                    label: 'Pengajuan Cuti (Pending)',
                    data: @json($cutiPendingBulanan),
                    backgroundColor: '#06b6d4'
                },
                {
                    label: 'Karyawan Sedang Cuti (Disetujui)',
                    data: @json($cutiDisetujuiBulanan),
                    backgroundColor: '#6366f1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // biar proporsional
            scales: {
                y: { beginAtZero: true }
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
