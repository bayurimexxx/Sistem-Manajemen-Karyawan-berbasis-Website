@extends('admin.layout.app')

@section('content')
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar otomatis ikut dari layout -->

        <main class="p-6 w-full">
            <h2 class="text-2xl font-bold mb-6">Absensi & Cuti</h2>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kehadiran -->
                <div
                    class="card bg-green-500 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4 opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2h6v2m-6-4V7a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6" />
                    </svg>
                    <div>
                        <h3 class="text-4xl font-bold">{{ $jumlahHadir ?? 0 }}</h3>
                        <p class="mt-2 text-lg">Jumlah Kehadiran</p>
                    </div>
                </div>

                <!-- Pengajuan Cuti -->
                <div
                    class="card bg-emerald-400 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4 opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <h3 class="text-4xl font-bold">{{ $jumlahCuti ?? 0 }}</h3>
                        <p class="mt-2 text-lg">Pengajuan Cuti</p>
                    </div>
                </div>

                <!-- Izin & Sakit -->
                <div
                    class="card bg-blue-500 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 flex items-center space-x-4 opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a5 5 0 00-10 0v2a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2z" />
                    </svg>
                    <div>
                        <h3 class="text-4xl font-bold">{{ $jumlahIzin ?? 0 }}</h3>
                        <p class="mt-2 text-lg">Izin & Sakit</p>
                    </div>
                </div>
            </div>

            <!-- Tabel Absensi -->
            <div class="mt-10 bg-white rounded-xl shadow p-6">
                <h3 class="text-xl font-bold mb-4">Daftar Absensi</h3>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataAbsensi ?? [] as $absen)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $absen->nama }}</td>
                                <td class="px-4 py-2">{{ $absen->tanggal }}</td>
                                <td class="px-4 py-2">{{ $absen->status }}</td>
                                <td class="px-4 py-2">{{ $absen->keterangan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada data absensi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

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
</body>
@endsection
