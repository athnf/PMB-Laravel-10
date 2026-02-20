@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-[#1E3A8A] mb-2 tracking-tight">Dashboard Overview</h1>
    <p class="text-sm text-gray-500 font-medium">Ringkasan statistik penerimaan mahasiswa baru dan performa sistem ujian.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
    <!-- Card 1 -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
        <div class="absolute right-0 top-0 mt-4 mr-4 bg-blue-50 text-[#2563EB] p-2 rounded-xl group-hover:bg-[#2563EB] group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </div>
        <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Total Pendaftar</h4>
        <p class="text-4xl font-black text-[#0F172A]">{{ $stats['total_pendaftar'] }}</p>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
        <div class="absolute right-0 top-0 mt-4 mr-4 bg-yellow-50 text-[#F59E0B] p-2 rounded-xl group-hover:bg-[#F59E0B] group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </div>
        <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Ikut Ujian</h4>
        <p class="text-4xl font-black text-[#0F172A]">{{ $stats['total_ikut_ujian'] }}</p>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
        <div class="absolute right-0 top-0 mt-4 mr-4 bg-green-50 text-emerald-600 p-2 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Lulus Ujian</h4>
        <p class="text-4xl font-black text-emerald-600">{{ $stats['total_lulus'] }}</p>
    </div>

    <!-- Card 4 -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
        <div class="absolute right-0 top-0 mt-4 mr-4 bg-red-50 text-red-600 p-2 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Gagal Ujian</h4>
        <p class="text-4xl font-black text-red-600">{{ $stats['total_gagal'] }}</p>
    </div>

    <!-- Card 5 -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow xl:col-span-2">
        <div class="absolute right-0 top-0 mt-4 mr-4 bg-indigo-50 text-[#1E3A8A] p-2 rounded-xl group-hover:bg-[#1E3A8A] group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
        </div>
        <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Daftar Ulang</h4>
        <p class="text-4xl font-black text-[#1E3A8A]">{{ $stats['total_daftar_ulang'] }} <span class="text-sm font-medium text-gray-400">Berkas Verifikasi</span></p>
    </div>

    <!-- Card 6 -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow xl:col-span-2">
        <div class="absolute right-0 top-0 mt-4 mr-4 bg-blue-50 text-[#2563EB] p-2 rounded-xl group-hover:bg-[#2563EB] group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        </div>
        <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Mahasiswa Resmi (NIM)</h4>
        <p class="text-4xl font-black text-[#2563EB]">{{ $stats['total_mahasiswa'] }} <span class="text-sm font-medium text-gray-400">Mahasiswa</span></p>
    </div>
</div>
@endsection
