@extends('admin.layout.app')

@section('content')
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
      
            <main class="p-6">
                <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2> <!-- Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Karyawan -->
                    <div
    class="card bg-green-500 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
    </svg>
    <div>
        <h3 class="text-4xl font-bold">{{ $jumlahKaryawan }}</h3>
<p class="mt-2 text-lg">Jumlah Karyawan</p>
    </div>
</div> <!-- Pengajuan Cuti -->
                    <div
                        class="card bg-emerald-400 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 opacity-0 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <h3 class="text-4xl font-bold">35</h3>
                            <p class="mt-2 text-lg">Jumlah Pengajuan Cuti</p>
                        </div>
                    </div> <!-- Laporan -->
                    <div
                        class="card bg-blue-500 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 opacity-0 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
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
            </main>
        </div>
    </div>
    <script>
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menu-btn');
    const overlay = document.getElementById('overlay');
    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });
    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
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
</body>

@endsection
