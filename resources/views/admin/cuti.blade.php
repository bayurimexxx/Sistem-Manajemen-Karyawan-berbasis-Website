@extends('admin.layout.app')

@section('content')
<div class="container mx-auto p-6 animate-fade-in">
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Data Cuti</h2>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-gray-100">
                <tr>
                    
                    <th class="border px-4 py-2">Nama Karyawan</th>
                    <th class="border px-4 py-2">Tanggal Mulai</th>
                    <th class="border px-4 py-2">Tanggal Selesai</th>
                    <th class="border px-4 py-2">Alasan</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cutis as $cuti)
                    <tr>
                        
                        <td class="border px-4 py-2">{{ $cuti->karyawan->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $cuti->tanggal_mulai }}</td>
                        <td class="border px-4 py-2">{{ $cuti->tanggal_selesai }}</td>
                        <td class="border px-4 py-2">{{ $cuti->alasan }}</td>
                        <td class="border px-4 py-2">
                            @if($cuti->status == 'disetujui')
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Disetujui</span>
                            @elseif($cuti->status == 'ditolak')
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">Ditolak</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-yellow-500 rounded-full">Pending</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('admin.cuti.destroy', $cuti->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                 <button 
        class="px-3 py-2 rounded flex items-center space-x-1
               border border-red-500 text-red-500
               hover:bg-red-500 hover:text-white transition duration-300">
        <!-- Icon Tempat Sampah Outline -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h10" />
        </svg>
        <span>Delete</span>
    </button>   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4">Belum ada data cuti</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fadeIn 0.6s ease-out;
}
</style>
@endsection
