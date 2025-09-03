<div id="sidebar"
  class="bg-gray-900 text-white w-64 p-4 space-y-6 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-all duration-500 ease-in-out z-50">
  
  <h2 class="text-xl font-bold tracking-wide flex items-center gap-2">
    ★ <span>PERADABAN GEMILANG</span>
  </h2>

  <a href="{{ route('admin.dashboard') }}"
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8h8m-8 0H4" />
    </svg>
    <span>Dashboard Admin</span>
</a>


<a href="{{ route('admin.data_karyawan') }}"
class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.data_karyawan') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
      </svg>
      <span>Data Karyawan</span>
    </a>


<a href="{{ route('admin.data_manager') }}"
class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.data_manager') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 20h5v-2a4 4 0 00-3-3.87M7 10a4 4 0 110-8 4 4 0 010 8zm10 0a4 4 0 110-8 4 4 0 010 8z" />
      </svg>
      <span>Data Manager</span>
    </a>

<a href="{{ route('admin.cuti.index') }}"
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.cuti.*') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    <span>Data Cuti</span>
</a>


  <a href="{{ route('admin.absensi.index') }}"
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.absensi.*') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M8 7V3m8 4V3m-9 8h10m-6 4h2m-9 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    <span>Absensi</span>
</a>



   <a href="{{ route('admin.payroll.index') }}"
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.payroll.*') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V4m0 12v4" />
    </svg>
    <span>Payroll</span>
</a>

    <a href="{{ route('admin.laporan') }}" 
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.laporan') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 icon-bounce" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2"
            d="M3 3v18h18M9 17V9m4 8v-5m4 5V5" />
    </svg>
    <span>Laporan</span>
</a>
<a href="{{ route('admin.settings') }}" 
   class="group flex items-center space-x-3 px-4 py-2 rounded-lg transition
          {{ request()->routeIs('admin.settings') ? 'bg-blue-600 text-white' : 'hover:bg-blue-600' }}">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 icon-bounce" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2"
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
