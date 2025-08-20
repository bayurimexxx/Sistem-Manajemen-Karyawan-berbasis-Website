<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Management Karyawan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav id="navbar"
        class="bg-gray-900/80 backdrop-blur text-white px-6 py-4 flex justify-between items-center fixed w-full z-50 transition-all duration-300">
        <div class="flex items-center space-x-2">
            <span class="text-2xl animate-pulse">★</span>
            <span class="font-bold text-lg">Peradaban Gemilang</span>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ url('/login') }}"
                class="transition bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 hover:-translate-y-1 hover:scale-105 duration-300">
                Login
            </a>

            <div class="relative group">
                <button class="bg-gray-600 px-4 py-2 rounded-md flex items-center hover:bg-gray-700 transition">
                    Tentang Kami
                    <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute hidden group-hover:block bg-white text-black rounded-md mt-1 shadow-md w-40 transition-all duration-200 origin-top scale-95 group-hover:scale-100 group-hover:opacity-100 opacity-0">
                    <a href="#tentang" class="block px-4 py-2 hover:bg-gray-200">Tentang Sistem</a>
                    <a href="#kontak" class="block px-4 py-2 hover:bg-gray-200">Kontak Kami</a>
                    <a href="#sosmed" class="block px-4 py-2 hover:bg-gray-200">Sosial Media</a>
                </div>

                <!-- Dropdown Login -->
            </div>
        </div>
    </nav>

    <<<<<<< HEAD <!-- Hero Section -->
        <section class="relative bg-cover bg-center h-screen"
            style="background-image: url('https://images.unsplash.com/photo-1551836022-4c4c79ecde51?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
                <h1 class="text-4xl md:text-5xl font-bold mb-4" id="typing"></h1>
                <p class="max-w-2xl text-lg md:text-xl" data-aos="fade-up" data-aos-delay="300">
                    Sistem ini membantu perusahaan mengatur data karyawan, absensi, dan laporan dengan cepat, aman, dan
                    efisien.
                </p>
            </div>
        </section>
        =======
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-1">
            <a href="{{ route('login.admin') }}"
                class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Admin Login</a>
            <a href="{{ route('login.karyawan') }}"
                class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Karyawan Login</a>
            <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Manager Login</a>
            <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Tentang Sistem</a>
            <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Kontak Kami</a>
            <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Sosial Media</a>
        </div>
        >>>>>>> b94eafc2dc6ce1b754d709e8e447ad5477177393

        <!-- Tentang -->
        <section id="tentang" class="py-16 bg-white text-gray-800">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-6" data-aos="fade-down">Tentang Sistem</h2>
                <p class="text-lg" data-aos="fade-up">Sistem ini dirancang untuk mempermudah perusahaan dalam mengelola
                    data
                    karyawan, absensi serta laporan.</p>
            </div>
        </section>

        <!-- Kontak -->
        <section id="kontak" class="py-16 bg-gray-100 text-gray-800">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-6" data-aos="fade-down">Kontak Kami</h2>
                <p data-aos="fade-up">Email: info@peradabangemilang.com</p>
                <p data-aos="fade-up">Telepon: +62 812 3456 7890</p>
            </div>
        </section>

        <!-- Sosmed -->
        <section id="sosmed" class="py-16 bg-white text-gray-800">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-6" data-aos="fade-down">Sosial Media</h2>
                <div class="flex justify-center space-x-6" data-aos="fade-up">
                    <a href="#" class="hover:text-blue-600">Facebook</a>
                    <a href="#" class="hover:text-blue-400">Twitter</a>
                    <a href="#" class="hover:text-pink-500">Instagram</a>
                    <a href="#" class="hover:text-red-600">YouTube</a>
                </div>
            </div>
        </section>

        <!-- AOS & Typing script -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // typing
        const text = "Sistem Management Karyawan";
        let i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById("typing").innerHTML += text.charAt(i);
                i++;
                setTimeout(type, 80);
            }
        }
        window.onload = type;
        </script>
</body>

</html>