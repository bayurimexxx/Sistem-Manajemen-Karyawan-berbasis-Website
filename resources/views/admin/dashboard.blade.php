@extends('admin.layout.app')

@section('content')
<div class="flex h-screen">
    <!-- Main Content -->
    <main class="flex-1 p-6">

        <!-- Header dengan Burger Menu -->
        <div class="flex items-center space-x-3 mb-6">
            <button id="menu-btn" class="text-gray-600 hover:text-gray-900 focus:outline-none">
        </div>

        <!-- Cards Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Karyawan -->
            <div
                class="card bg-gradient-to-r from-green-400 to-green-600 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4 opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
                </svg>
                <div>
                    <h3 class="text-4xl font-bold">{{ $jumlahKaryawan }}</h3>
                    <p class="mt-2 text-lg">Jumlah Karyawan</p>
                </div>
            </div>

            <!-- Pengajuan Cuti -->
            <div
                class="card bg-gradient-to-r from-cyan-400 to-cyan-600 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4 opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <div>
                    <h3 class="text-4xl font-bold">35</h3>
                    <p class="mt-2 text-lg">Jumlah Pengajuan Cuti</p>
                </div>
            </div>

            <!-- Laporan -->
            <div
                class="card bg-gradient-to-r from-blue-400 to-blue-600 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4 opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2h6v2m-6-4V7a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6" />
                </svg>
                <div>
                    <h3 class="text-4xl font-bold">12</h3>
                    <p class="mt-2 text-lg">Jumlah Laporan</p>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-xl font-bold mb-4">Statistik Bulanan</h2>
            <canvas id="myChart" height="120"></canvas>
        </div>
    </main>
</div>

<!-- Script Animasi Card -->
<script>
    window.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".card");
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add("animate-fade-up");
                card.classList.remove("opacity-0");
            }, index * 200);
        });
    });
</script>

<!-- Tambahkan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // bisa diganti 'line', 'pie', dll
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pengajuan Cuti',
                data: [3, 7, 4, 6, 8, 5],
                backgroundColor: 'rgba(6, 182, 212, 0.7)', // cyan
            }, {
                label: 'Laporan',
                data: [2, 4, 5, 3, 6, 4],
                backgroundColor: 'rgba(37, 99, 235, 0.7)', // blue
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>
@endsection
