@extends('layouts.app')

@push('styles')
<style>
    body { background-color: #F8FAFC !important; color: #0F172A !important; }
</style>
@endpush

@section('content')
<div class="flex justify-center items-center py-8 px-4">
    <div class="flex w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 relative">
        <!-- Top decorative bar -->
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#1E3A8A] via-[#2563EB] to-[#F59E0B]"></div>

        <div class="w-full p-8 md:p-12">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#F8FAFC] border border-gray-200 text-[#1E3A8A] rounded-2xl mb-4 shadow-sm ring-4 ring-white">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#0F172A] tracking-tight">Formulir Pendaftaran</h2>
                <div class="h-1 w-16 bg-[#2563EB] my-4 mx-auto rounded-full"></div>
                <p class="text-gray-500 mt-2 text-sm md:text-base">Lengkapi data diri Anda di bawah ini secara benar untuk membuat akun penerimaan mahasiswa baru.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso" class="appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Email Aktif <span class="text-red-500">*</span></label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="email@contoh.com" class="appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required placeholder="081234567890" class="appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Alamat Domisili <span class="text-red-500">*</span></label>
                        <textarea id="address" name="address" required rows="3" placeholder="Jl. Sudirman No..." class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium leading-relaxed">{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Buat Password <span class="text-red-500">*</span></label>
                        <input id="password" name="password" type="password" required placeholder="Minimal 8 karakter" class="appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Ketik ulang password" class="appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-100 flex flex-col-reverse sm:flex-row items-center justify-between gap-6">
                    <p class="text-sm text-gray-500 font-medium">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-[#2563EB] font-bold hover:text-[#1E3A8A] transition-colors duration-200">Masuk di sini &rarr;</a>
                    </p>
                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center py-3.5 px-8 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                        DAFTARKAN AKUN
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
