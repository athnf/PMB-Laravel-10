@extends('layouts.app')

@section('content')
<div class="min-h-[85vh] flex justify-center items-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#F8FAFC] to-[#EFF6FF]">
    <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-blue-50 relative overflow-hidden">
        
        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-48 h-48 rounded-full opacity-10 bg-[#2563EB]"></div>
        
        <div class="text-center relative z-10">
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-indigo-100 mb-6 border-4 border-white shadow-lg shadow-indigo-200">
                <svg class="h-10 w-10 text-[#1E3A8A]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </div>
            <h2 class="text-4xl font-black text-[#0F172A] tracking-tight mb-2">PERSIAPAN UJIAN</h2>
            <p class="text-[15px] font-medium text-gray-500 max-w-sm mx-auto">Anda akan mengerjakan Ujian Seleksi Penerimaan Mahasiswa Baru.</p>
        </div>

        <div class="mt-8 relative z-10">
            <div class="bg-amber-50 rounded-2xl p-6 border border-amber-200/60 shadow-inner">
                <h3 class="text-sm font-extrabold text-amber-800 uppercase tracking-widest mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Peraturan Tegas Ujian
                </h3>
                <ul class="text-[14px] text-amber-900/80 space-y-3 font-semibold list-none">
                    <li class="flex items-start">
                        <span class="mr-3 mt-1 text-amber-500">1.</span>
                        <span>Ujian terdiri dari soal pilihan ganda yang diacak oleh sistem.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 mt-1 text-amber-500">2.</span>
                        <span>Waktu pengerjaan (60 Menit) berjalan konstan di server. Waktu terus berjalan walau browser tertutup.</span>
                    </li>
                    <li class="flex items-start text-red-700 font-bold bg-white/50 p-2 rounded-lg mix-blend-multiply border border-red-100">
                        <span class="mr-3 mt-1 text-red-500">3.</span>
                        <span>DILARANG BERPINDAH TAB / BROWSER! Sistem merekam segala aktivitas dan akan memblokir Anda.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 mt-1 text-amber-500">4.</span>
                        <span>DILARANG ME-REFRESH HALAMAN! Me-reload halaman berarti mengakhiri sesi seketika dengan skor dibekukan.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 mt-1 text-amber-500">5.</span>
                        <span>Pastikan koneksi internet stabil sebelum Anda menekan tombol mulai.</span>
                    </li>
                </ul>
            </div>
            
            <form action="{{ route('student.exam.start') }}" method="POST" class="mt-10">
                @csrf
                <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-extrabold rounded-xl text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-[#2563EB] transition-all overflow-hidden shadow-xl shadow-blue-900/20">
                    <span class="absolute inset-0 w-full h-full bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></span>
                    <span class="relative flex items-center tracking-wide">
                        SAYA MENGERTI & MULAI SEKARANG
                        <svg class="ml-2 -mr-1 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
