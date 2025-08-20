<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gray-900 text-white w-64 p-4 space-y-6 fixed inset-y-0 left-0 
      transform -translate-x-full md:translate-x-0 transition-all duration-500 ease-in-out z-50">
            <h2 class="text-xl font-bold">★PERADABAN GEMILANG</h2>
            <nav class="space-y-2">
                <a href="#"
                    class="flex items-center space-x-3 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 transition">
                    <!-- Home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8h8m-8 0H4" />
                    </svg>
                    <span>Dashboard Admin</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    <!-- User group -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
                    </svg>
                    <span>Data Karyawan</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    <!-- Calendar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Absensi dan Cuti</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    <!-- Dollar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V4m0 12v4" />
                    </svg>
                    <span>Payroll</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    <!-- Chart bar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3v18h18M9 17V9m4 8v-5m4 5V5" />
                    </svg>
                    <span>Laporan</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    <!-- Settings -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.983 13.998a2 2 0 110-3.996 2 2 0 010 3.996zM4.94 4.94l2.828 2.829m8.485 8.484l2.829 2.829m0-11.313l-2.829 2.829M7.768 16.253l-2.829 2.829" />
                    </svg>
                    <span>Pengaturan</span>
                </a>
                <div class="flex justify-center mt-4">
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
                            Logout
                        </button>
                    </form>
                </div>

            </nav>
        </div>

        <!-- Overlay -->
        <div id="overlay"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden md:hidden z-40 transition-opacity duration-500">
        </div>

        <!-- Main content -->
        <div class="flex-1 md:ml-64">
            <header class="flex items-center justify-between bg-white p-4 shadow-md">
                <h1 class="text-lg font-semibold">Admin</h1>
                <button id="menu-btn" class="md:hidden bg-blue-600 text-white px-3 py-2 rounded-lg">☰</button>
            </header>
            <main class="p-6">
                <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

                <!-- Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Karyawan -->
                    <div
                        class="card bg-green-500 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 opacity-0 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
                        </svg>
                        <div>
                            <h3 class="text-4xl font-bold">120</h3>
                            <p class="mt-2 text-lg">Jumlah Karyawan</p>
                        </div>
                    </div>

                    <!-- Pengajuan Cuti -->
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
                    </div>

                    <!-- Laporan -->
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

</html>