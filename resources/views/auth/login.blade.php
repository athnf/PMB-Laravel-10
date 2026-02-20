@extends('layouts.app')

@push('styles')
<style>
    body { background-color: #F8FAFC !important; color: #0F172A !important; }
</style>
@endpush

@section('content')
<div class="flex justify-center items-center min-h-[80vh] px-4 -mt-2">
    <div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
        <!-- Left Side: Branding / Banner -->
        <div class="w-full md:w-5/12 bg-[#1E3A8A] flex flex-col justify-center items-start p-10 md:p-12 relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-48 h-48 bg-[#2563EB] rounded-full opacity-50 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-48 h-48 bg-[#F59E0B] rounded-full opacity-30 blur-3xl"></div>
            
            <div class="relative z-10 w-full">
                <!-- University Logo Placeholder -->
                <div class="w-16 h-16 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl flex items-center justify-center mb-8 shadow-xl">
                    <svg class="w-10 h-10 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                </div>
                
                <h1 class="text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-4 tracking-tight">
                    Sistem Penerimaan<br><span class="text-[#F59E0B]">Mahasiswa Baru</span>
                </h1>
                <p class="text-blue-100 text-sm md:text-base leading-relaxed mb-8 opacity-90">
                    Portal resmi pendaftaran dan ujian masuk universitas. Langkah pertama menuju masa depan cemerlang dimulai di sini.
                </p>

                <div class="flex items-center space-x-3 bg-[#0F172A]/40 p-4 rounded-xl backdrop-blur-sm border border-white/10 shadow-inner">
                    <div class="bg-[#F59E0B]/20 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-xs text-blue-50">Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-[#F59E0B] hover:text-white transition ease-in-out duration-200">Daftar sekarang &rarr;</a></p>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-7/12 p-10 md:p-14 lg:p-16 flex flex-col justify-center relative">
            
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-3xl font-extrabold text-[#0F172A] mb-2 tracking-tight">Selamat Datang</h2>
                <div class="h-1 w-12 bg-[#2563EB] mb-4 mx-auto md:mx-0 rounded-full"></div>
                <p class="text-sm text-gray-500">Silakan masukkan kredensial akun Anda untuk mengakses dashboard peserta.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-[#2563EB]">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#2563EB] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" required placeholder="email.anda@contoh.com" class="pl-11 appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-[#2563EB]">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#2563EB] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" required placeholder="••••••••" class="pl-11 appearance-none block w-full px-4 py-3.5 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center group">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#2563EB] focus:ring-[#2563EB] border-gray-300 rounded cursor-pointer transition-colors">
                        <label for="remember" class="ml-2 block text-sm font-medium text-gray-500 cursor-pointer group-hover:text-[#0F172A] transition-colors duration-200"> Tetap masuk </label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-bold text-[#2563EB] hover:text-[#1E3A8A] transition-colors duration-200">Lupa password?</a>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                        MASUK SISTEM
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
