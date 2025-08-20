<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sistem Management Karyawan</title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative min-h-screen flex items-center justify-center bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1551836022-4c4c79ecde51?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">

    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

    <!-- Login Card -->
    <div
        class="relative z-10 bg-white/10 backdrop-blur-md rounded-xl p-8 w-full max-w-md text-white shadow-lg animate-fade-up">
        <h3 class="text-2xl font-bold text-center mb-6 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0a5 5 0 0 0-5 5v3H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-1V5a5 5 0 0 0-5-5zM6 5a2 2 0 1 1 4 0v3H6V5z" />
            </svg>
            Login
        </h3>

        <form action="{{ route('admin.dashboard') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-white">Email Admin</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email admin" required
                    class="mt-1 w-full px-4 py-2 rounded-lg bg-white/90 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-white">Kata Sandi</label>
                <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" required
                    class="mt-1 w-full px-4 py-2 rounded-lg bg-white/90 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 transition-colors py-2 rounded-lg font-semibold flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M6 3a1 1 0 0 1 1 1v2h5.5a.5.5 0 0 1 0 1H7v2h5.5a.5.5 0 0 1 0 1H7v2a1 1 0 0 1-2 0V4a1 1 0 0 1 1-1z" />
                </svg>
                Masuk
            </button>
        </form>

        <!-- Tombol kembali ke Homepage -->
        <a href="{{ route('home') }}" class="block mt-4 text-center text-gray-200 hover:text-indigo-400 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
            </svg>
            Kembali ke Homepage
        </a>

        <div class="text-center text-gray-300 text-sm mt-4">
            &copy; {{ date('Y') }} Sistem Management Karyawan
        </div>
    </div>
    <style>
    @keyframes fadeUp {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-up {
        animation: fadeUp .7s ease forwards;
    }
    </style>
</body>

</html>