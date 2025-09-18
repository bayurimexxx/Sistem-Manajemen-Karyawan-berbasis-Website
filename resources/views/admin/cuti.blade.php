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
                                <span class="px-3 py-1 rounded flex items-center space-x-1 
                                       border border-green-500 text-green-500 
                                       hover:bg-green-500 hover:text-white transition duration-300">Disetujui</span>
                            @elseif($cuti->status == 'ditolak')
                                <span class="px-3 py-1 rounded flex items-center space-x-1 
                                       border border-red-500 text-red-500 
                                       hover:bg-red-500 hover:text-white transition duration-300">Ditolak</span>
                            @else
                                <span class="px-3 py-1 rounded flex items-center space-x-1 
                                       border border-yellow-500 text-yellow-500 
                                       hover:bg-yellow-500 hover:text-white transition duration-300">Pending</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 flex justify-center space-x-2">
                            <!-- Tombol Edit -->
                            <button onclick="document.getElementById('modal-edit-{{ $cuti->id }}').classList.remove('hidden')"
                                class="px-3 py-1 rounded flex items-center space-x-1 
                                       border border-yellow-500 text-yellow-500 
                                       hover:bg-yellow-500 hover:text-white transition duration-300">
                                Edit
                            </button>

                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.cuti.destroy', $cuti->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button 
                                    class="px-3 py-1 rounded border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div id="modal-edit-{{ $cuti->id }}" 
                         class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                            <h3 class="text-xl font-bold mb-4">Edit Cuti</h3>

                            <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Status -->
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Status Cuti</label>
                                    <select name="status" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="pending" {{ $cuti->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="disetujui" {{ $cuti->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                        <option value="ditolak" {{ $cuti->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="flex justify-end space-x-3">
                                    <button type="button" onclick="document.getElementById('modal-edit-{{ $cuti->id }}').classList.add('hidden')" 
                                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                                    <button type="submit" 
                                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
