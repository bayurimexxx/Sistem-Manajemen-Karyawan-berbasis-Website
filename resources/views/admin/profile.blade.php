@extends('admin.layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-10">
    <div class="bg-white shadow-xl rounded-2xl w-full max-w-5xl p-10">

        {{-- Judul --}}
       <h2 class="text-2xl font-bold mb-6">Profile</h2>

        {{-- Container Flex: Form kiri, Foto kanan --}}
        <div class="flex flex-col md:flex-row items-start gap-12">

            {{-- Form Profil --}}
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 flex-1">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                        class="mt-1 block w-full border-b border-gray-300 focus:border-pink-500 focus:ring-0 text-lg">
                </div>

                {{-- Email --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">E-Mail</label>
                    <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                        class="mt-1 block w-full border-b border-gray-300 focus:border-pink-500 focus:ring-0 text-lg">
                </div>

                {{-- Password Baru --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Password Baru</label>
                    <input type="password" name="new_password"
                        class="mt-1 block w-full border-b border-gray-300 focus:border-pink-500 focus:ring-0 text-lg">
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Konfirmasi Password</label>
                    <input type="password" name="new_password_confirmation"
                        class="mt-1 block w-full border-b border-gray-300 focus:border-pink-500 focus:ring-0 text-lg">
                </div>

                {{-- Tombol Simpan --}}
                <button type="submit"
                     class="bg-gradient-to-r from-[#2f4858] to-[#007b89] 
         hover:from-[#007b89] hover:to-[#2f4858] 
         text-white px-4 py-2 rounded mb-4 transition duration-300">
                    Simpan Perubahan
                </button>
            </form>

            {{-- Foto Profil --}}
            <div class="flex flex-col items-center md:items-start">
                <div class="relative">
                    <img id="preview" 
                         src="{{ $admin->foto ? asset($admin->foto) : asset('admin/default.png') }}"
                         alt="Foto Profil"
                         class="w-40 h-40 rounded-full object-cover border-4 border-white shadow-lg">

                    {{-- Tombol Kamera --}}
                    <label for="foto" 
                           class="absolute bottom-2 right-2 bg-white p-2 rounded-full shadow cursor-pointer hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7h2l2-3h10l2 3h2v13H3V7z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                    </label>
                    <input id="foto" name="foto" type="file" class="hidden" accept="image/*">
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Script Preview Foto --}}
<script>
document.getElementById('foto').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(e.target.files[0]);
});
</script>
@endsection
