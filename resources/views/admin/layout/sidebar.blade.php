<div id="sidebar"
  class=" bg-[#2f4858] text-white w-64 p-4 space-y-6 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-all duration-500 ease-in-out z-50">

  <!-- Logo -->
  <div class="flex items-left justify-left mb-6">
    <img src="{{ asset('asset/image-removebg-preview.png') }}" 
         class="w-52 h-auto">
  </div>


  <!-- Dashboard -->
  <a href="{{ route('admin.dashboard') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8h8m-8 0H4" />
    </svg>
    <span>Dashboard Admin</span>
  </a>

  <!-- Data Karyawan -->
  <a href="{{ route('admin.data_karyawan') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.data_karyawan') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
    </svg>
    <span>Data Karyawan</span>
  </a>

  <!-- Data Manager -->
  <a href="{{ route('admin.data_manager') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.data_manager') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
    </svg>
    <span>Data Manager</span>
  </a>

  <!-- Data Cuti -->
  <a href="{{ route('admin.cuti.index') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.cuti.*') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    <span>Data Cuti</span>
  </a>

  <!-- Absensi -->
  <a href="{{ route('admin.absensi.index') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.absensi.*') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    <span>Absensi</span>
  </a>

  <!-- Payroll -->
  <a href="{{ route('admin.payroll.index') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.payroll.*') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V4m0 12v4" />
    </svg>
    <span>Payroll</span>
  </a>

  <!-- Laporan -->
  <a href="{{ route('admin.laporan') }}"
     class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.laporan') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M3 3v18h18M9 17V9m4 8v-5m4 5V5" />
    </svg>
    <span>Laporan</span>
  </a>

  <!-- Pengaturan -->
<a href="{{ route('admin.profile.edit') }}"
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.profile.edit') ? 'bg-gradient-to-r from-[#2f4858] to-[#007b89] text-white' : 'hover:bg-gradient-to-r from-[#2f4858] to-[#007b89]' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.635 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    <span>Profile</span>
</a>


  <!-- Logout -->
  <div class="flex justify-center mt-4">
    <form action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
     <button class="w-full px-3 py-2 rounded border border-red-500 text-red-500 
               hover:bg-red-500 hover:text-white transition duration-300">
  Logout
</button>

    </form>
  </div>
</div>
