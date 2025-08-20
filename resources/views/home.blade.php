<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Management Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-900 m-0 p-0">

  <!-- Navbar -->
  <nav class="bg-gray-900 shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">

        <!-- Brand -->
        <a href="#" class="flex items-center text-white font-bold text-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 .587l3.668 7.568L24 9.748l-6 5.841L19.335 24 12 19.897 4.665 24 6 15.589 0 9.748l8.332-1.593z"/>
          </svg>
          Peradaban Gemilang
        </a>

        <!-- Hamburger Menu Mobile -->
        <div class="md:hidden flex items-center">
          <button id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center space-x-4 relative">

          <!-- Dropdown Login -->
          <div class="relative">
            <button id="loginButton" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
              Login
            </button>
            <div id="loginDropdown" class="absolute right-0 hidden bg-white shadow-lg mt-2 rounded-md w-40 z-50">
              <a href="{{ route('login.admin') }}" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Admin</a>
              <a href="{{ route('login.karyawan') }}" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Karyawan</a>
              <a href="{{ route('login.manager') }}" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Manager</a>
            </div>
          </div>

          <!-- Dropdown Tentang Kami -->
          <div class="relative">
            <button id="aboutButton" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
              Tentang Kami
            </button>
            <div id="aboutDropdown" class="absolute right-0 hidden bg-white shadow-lg mt-2 rounded-md w-40 z-50">
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Tentang Sistem</a>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Kontak Kami</a>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Sosial Media</a>
            </div>
          </div>

        </div>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-1">
        <a href="{{ route('login.admin') }}" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Admin Login</a>
        <a href="{{ route('login.karyawan') }}" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Karyawan Login</a>
        <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Manager Login</a>
        <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Tentang Sistem</a>
        <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Kontak Kami</a>
        <a href="#" class="block px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-600">Sosial Media</a>
      </div>

    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative h-screen flex items-center justify-center text-center bg-cover bg-center pt-16"
    style="background-image: url('https://images.unsplash.com/photo-1551836022-4c4c79ecde51?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <!-- Content -->
    <div class="relative z-10 px-6">
      <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4">
        Sistem Management Karyawan
      </h1>
      <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
        Sistem Manajemen Karyawan membantu perusahaan mengatur data pegawai, absensi, dan laporan dengan cepat, aman, dan efisien.
      </p>
    </div>
  </section>

  <script>
    // Toggle mobile menu
    const mobileBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Dropdown Login
    const loginBtn = document.getElementById('loginButton');
    const loginDropdown = document.getElementById('loginDropdown');

    loginBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      loginDropdown.classList.toggle('hidden');
      aboutDropdown.classList.add('hidden');
    });

    // Dropdown Tentang Kami
    const aboutBtn = document.getElementById('aboutButton');
    const aboutDropdown = document.getElementById('aboutDropdown');

    aboutBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      aboutDropdown.classList.toggle('hidden');
      loginDropdown.classList.add('hidden');
    });

    // Tutup dropdown ketika klik di luar
    window.addEventListener('click', () => {
      loginDropdown.classList.add('hidden');
      aboutDropdown.classList.add('hidden');
    });
  </script>

</body>
</html>
