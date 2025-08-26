<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Admin')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    @keyframes slideIn {
      from { transform: translateX(-100%); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
      from { transform: translateX(0); opacity: 1; }
      to { transform: translateX(-100%); opacity: 0; }
    }
    .sidebar-enter { animation: slideIn 0.5s ease forwards; }
    .sidebar-exit { animation: slideOut 0.5s ease forwards; }
    .icon-bounce { transition: transform 0.3s ease; }
    .group:hover .icon-bounce { transform: translateX(6px) scale(1.1); }
  </style>
</head>

<body class="bg-gray-100">
  <div class="flex h-screen">

    {{-- Sidebar --}}
    @include('admin.layout.sidebar')

    {{-- Overlay --}}
    <div id="overlay"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden md:hidden z-40 transition-opacity duration-500">
    </div>

    {{-- Content --}}
    <div class="flex-1 md:ml-64">

      {{-- Header --}}
      <header class="flex items-center justify-between bg-white p-4 shadow-md">
        {{-- Tombol Burger --}}
        <button id="menu-btn" class="md:hidden text-gray-700 text-2xl">☰</button>

       
  {{-- Profil (pindah ke kanan atas) --}}
  <div class="flex items-center space-x-3 ml-auto">
    <span class="hidden md:block text-gray-700 font-medium">Admin</span>
    <img src="/images/profile.png" alt="Profile"
      class="w-10 h-10 rounded-full border cursor-pointer">
  </div>
</header>

      {{-- Main Content --}}
      <main class="p-6 overflow-y-auto">
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menu-btn');
    const overlay = document.getElementById('overlay');

    menuBtn.addEventListener('click', () => {
      if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('sidebar-enter');
        overlay.classList.remove('hidden');
      } else {
        sidebar.classList.remove('sidebar-enter');
        sidebar.classList.add('sidebar-exit');
        overlay.classList.add('hidden');
        setTimeout(() => {
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('sidebar-exit');
        }, 500);
      }
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.remove('sidebar-enter');
      sidebar.classList.add('sidebar-exit');
      overlay.classList.add('hidden');
      setTimeout(() => {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('sidebar-exit');
      }, 500);
    });
  </script>
</body>
</html>
