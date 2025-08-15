<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Management Karyawan</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
            <div class="flex items-center">
                <span class="text-2xl font-bold">★</span>
                <span class="ml-2 font-semibold">Peradaban Gemilang</span>
            </div>
            <div class="flex items-center space-x-6">
                <!-- Dropdown Login -->
                <div class="relative group">
                    <button class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                        Login ▼
                    </button>
                    <div class="absolute hidden group-hover:block bg-white text-black mt-2 rounded shadow-lg w-32">
                        <a href="/login/admin" class="block px-4 py-2 hover:bg-gray-100">Admin</a>
                        <a href="/login/karyawan" class="block px-4 py-2 hover:bg-gray-100">Karyawan</a>
                        <a href="/login/manager" class="block px-4 py-2 hover:bg-gray-100">Manager</a>
                    </div>
                </div>
                <a href="#tentang" class="hover:underline">Tentang Kami</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen" style="background-image: url('/img/bg-meeting.jpg')">
        <div
            class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-center text-white px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sistem Management Karyawan</h1>
            <p class="max-w-2xl text-lg">
                Sistem Manajemen Karyawan membantu perusahaan mengatur data pegawai, absensi, dan laporan dengan cepat,
                aman, dan efisien.
            </p>
        </div>
    </section>

</body>

</html>