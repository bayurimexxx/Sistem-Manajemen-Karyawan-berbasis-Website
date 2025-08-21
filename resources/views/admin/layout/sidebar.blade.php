<div id="sidebar"
    class="bg-gray-900 text-white w-64 p-4 space-y-6 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-all duration-500 ease-in-out z-50">
    <h2 class="text-xl font-bold">★PERADABAN GEMILANG</h2>
    <nav class="space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Dashboard</a>
        <a href="{{ route('admin.data_karyawan') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Data Karyawan</a>
        <a href="{{ route('admin.absensi') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Absensi</a>
        <a href="{{ route('admin.payroll') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Payroll</a>
        <a href="{{ route('admin.laporan') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Laporan</a>
        <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Pengaturan</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg w-full">Logout</button>
        </form>
    </nav>
</div>
