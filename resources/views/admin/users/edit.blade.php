@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center w-10 h-10 bg-white border border-gray-200 rounded-full shadow-sm text-gray-500 hover:text-[#2563EB] hover:border-[#2563EB] hover:bg-blue-50 transition-all duration-200" title="Kembali ke Daftar Peserta">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-[#1E3A8A] tracking-tight">Perbarui Biodata Peserta</h1>
        </div>
    </div>
    <p class="text-sm text-gray-500 font-medium ml-14">Formulir manipulasi data master spesifik kandidat pendaftar ujian masuk.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden max-w-4xl">
    <div class="p-8">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Nama Peserta <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required placeholder="Contoh: Budi Santoso" class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Alamat Email Aktif <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required placeholder="email@contoh.com" class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Nomor Handphone/WhatsApp <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm text-gray-400 font-bold">+62</span>
                        </div>
                        <input type="text" name="phone" value="{{ old('phone', $user->profile?->phone) }}" required placeholder="81234567890" class="pl-12 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-500 mb-2 uppercase tracking-wide">Reset Kata Sandi</label>
                    <div class="relative">
                        <input type="password" name="password" placeholder="Biarkan kosong jika tetap" class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 sm:text-sm transition-all duration-300 font-medium">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1.5 text-[11px] text-gray-400 font-medium">Isi field ini KECUALI peserta minta reset sandi. Enkripsi satu-arah (hashes) aktif.</p>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Alamat Lengkap / Domisili <span class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3" placeholder="Sebutkan Jl, Kelurahan, Kec, dan Kota/Kab." class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm leading-relaxed bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">{{ old('address', $user->profile?->address) }}</textarea>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end">
                <button type="submit" class="inline-flex justify-center items-center py-3.5 px-8 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    SIMPAN PERUBAHAN
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
