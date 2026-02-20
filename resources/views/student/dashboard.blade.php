@extends('layouts.student')

@section('content')
<div class="mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <div>
            <h1 class="text-3xl font-extrabold text-[#1E3A8A] tracking-tight">Portal Kandidat Mahasiswa</h1>
            <p class="text-sm text-gray-500 font-medium mt-1">Kelola data profil, ikuti ujian seleksi masuk, dan lengkapi pemberkasan pendaftaran ulang.</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
    <!-- Profil & Data Kiri -->
    <div class="md:col-span-5 space-y-6">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-[#1E3A8A]/5 to-transparent flex items-center space-x-3">
                <div class="p-2 bg-blue-100 rounded-lg text-[#1E3A8A]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-[#1E3A8A]">Profil Pendaftar</h3>
            </div>
            <div class="p-6">
                <div class="flex flex-col items-center justify-center mb-6">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-[#1E3A8A] to-[#2563EB] text-white flex items-center justify-center text-4xl font-black shadow-lg shadow-[#2563EB]/30 mb-4 ring-4 ring-blue-50">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div class="text-xl font-bold text-gray-800 text-center">{{ $user->name }}</div>
                    <div class="text-sm font-medium text-gray-500 text-center">{{ $user->email }}</div>
                </div>

                <div class="space-y-4 pt-4 border-t border-gray-100">
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm font-bold text-gray-500 w-1/3">No. Test</span>
                        <span class="text-sm font-black text-[#0F172A] flex-1 text-right bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100">{{ $profile->test_number ?? 'Belum Digenerate' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm font-bold text-gray-500 w-1/3">No. Telp</span>
                        <span class="text-sm font-bold text-[#0F172A] flex-1 text-right">{{ $profile->phone ?? '-' }}</span>
                    </div>
                    @if($studentId)
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm font-bold text-gray-500 w-1/3">Status NIM</span>
                        <span class="text-sm font-extrabold text-emerald-700 flex-1 text-right bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100 flex items-center justify-end">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $studentId->nim }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Area Kanan (Ujian & Daftar Ulang) -->
    <div class="md:col-span-7 space-y-6">
        <!-- Status Ujian -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden relative group">
            <div class="absolute inset-0 bg-gradient-to-r {{ $profile->test_status === 'SELESAI' ? 'from-emerald-500/5 to-transparent' : 'from-amber-500/5 to-transparent' }} opacity-50"></div>
            
            <div class="p-6 border-b border-gray-100 relative z-10 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-2 {{ $profile->test_status === 'SELESAI' ? 'bg-emerald-100 text-emerald-600' : 'bg-amber-100 text-amber-600' }} rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-[#0F172A]">Status Seleksi Masuk</h3>
                </div>
                
                @if($profile->test_status === 'SELESAI')
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-[10px] uppercase font-black rounded-full border border-emerald-200 tracking-wider">Telah Ujian</span>
                @else
                    <span class="px-3 py-1 bg-amber-100 text-amber-800 text-[10px] uppercase font-black rounded-full border border-amber-200 tracking-wider animate-pulse">Menunggu Ujian</span>
                @endif
            </div>
            
            <div class="p-6 relative z-10">
                @if($profile->test_status !== 'SELESAI')
                    <div class="bg-amber-50 rounded-xl p-5 border border-amber-100 mb-6">
                        <h4 class="font-bold text-amber-800 flex items-center mb-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Perhatian Sebelum Memulai
                        </h4>
                        <ul class="text-sm text-amber-700/80 space-y-1.5 list-disc pl-5 font-medium">
                            <li>Sistem memiliki sistem Anti-Cheat. Layar akan dikunci secara penuh.</li>
                            <li>Tindakan berpindah tab/minimize/kembali akan memicu teguran dan penghentian paksa.</li>
                            <li>Koneksi internet wajib stabil selama proses pengerjaan soal.</li>
                        </ul>
                    </div>
                    <form action="{{ route('student.exam.show') }}" method="GET" class="w-full">
                        <button type="submit" class="w-full inline-flex justify-center items-center py-4 px-8 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-base font-black tracking-wide text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            MASUK RUANG UJIAN SEKARANG
                        </button>
                    </form>
                @else
                    <!-- Hasil Belum Dievaluasi -->
                    @if(($result->is_passed ?? 'PENDING') === 'PENDING')
                        <div class="text-center py-6">
                            <div class="w-20 h-20 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-blue-100">
                                <svg class="w-10 h-10 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">Evaluasi Sedang Berjalan</h4>
                            <p class="text-sm text-gray-500 font-medium">Kami telah menerima lembar jawaban Anda dengan perolehan skor awal <span class="font-extrabold text-[#1E3A8A]">{{ $result->total_score ?? 0 }}</span>. Silakan tunggu review final kelulusan dari Panitia PMB.</p>
                        </div>
                    <!-- Lulus -->
                    @elseif($result->is_passed === 'LULUS')
                        <div class="text-center py-4">
                            <div class="w-20 h-20 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-emerald-100 ring-4 ring-emerald-50/50">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="text-2xl font-black text-emerald-600 mb-2">LULUS SELEKSI!</h4>
                            <p class="text-sm text-gray-600 font-medium mb-4">Selamat! Anda dinyatakan lolos seleksi dengan skor total <span class="font-extrabold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">{{ $result->total_score }}</span>. Silakan lanjut ke proses Daftar Ulang di bawah.</p>
                            @if($result->admin_notes)
                            <div class="bg-gray-50 rounded-lg p-3 text-xs text-left italic font-medium text-gray-500 border border-gray-200">
                                " {{ $result->admin_notes }} " - Admin PMB
                            </div>
                            @endif
                        </div>
                    <!-- Tidak Lulus -->
                    @else
                        <div class="text-center py-4">
                            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-red-100">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="text-2xl font-black text-red-600 mb-2">TIDAK LULUS DARI SELEKSI</h4>
                            <p class="text-sm text-gray-600 font-medium mb-4">Mohon maaf, berdasarkan evaluasi dengan skor <span class="font-extrabold text-red-700 bg-red-50 px-2 py-0.5 rounded">{{ $result->total_score ?? 0 }}</span>, Anda dinyatakan tidak lulus seleksi kali ini.</p>
                            @if($result->admin_notes)
                            <div class="bg-gray-50 rounded-lg p-3 text-xs text-left italic font-medium text-gray-500 border border-gray-200">
                                " {{ $result->admin_notes }} " - Admin PMB
                            </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Daftar Ulang Box -->
        @if(($result->is_passed ?? '') === 'LULUS')
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 flex items-center space-x-3">
                <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-[#0F172A]">Daftar Ulang Mahasiswa Baru</h3>
            </div>
            
            <div class="p-6">
                @if(!$reRegistration)
                    <form action="{{ route('student.re-register') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="bg-blue-50/50 rounded-xl p-4 border border-blue-100">
                            <label class="flex items-start cursor-pointer group">
                                <div class="flex items-center h-5 mt-1">
                                    <input type="checkbox" name="confirmation" value="1" required class="w-5 h-5 bg-white border-2 border-blue-200 rounded text-[#2563EB] focus:ring-[#2563EB] focus:ring-offset-0 transition-colors cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="font-extrabold text-[#1E3A8A] block mb-0.5">Konfirmasi Sedia Berkuliah</span>
                                    <span class="text-gray-500 font-medium block">Saya menyatakan bersedia mengambil hak kelulusan saya dan mendaftar ulang secara resmi.</span>
                                </div>
                            </label>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Unggah Bukti Pembayaran / Syarat</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl relative hover:bg-gray-50 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-bold text-[#2563EB] hover:text-[#1E3A8A] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#2563EB]">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="payment_proof" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1 font-medium">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500 font-medium">PNG, JPG, PDF up to 2MB. Boleh kosong jika beasiswa penuh.</p>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full inline-flex justify-center items-center py-3.5 px-6 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                            KIRIM BERKAS DAFTAR ULANG
                        </button>
                    </form>
                @else
                    <div class="relative overflow-hidden bg-white border {{ $reRegistration->status === 'DISETUJUI' ? 'border-emerald-200 shadow-emerald-100/50' : ($reRegistration->status === 'DITOLAK' ? 'border-red-200 shadow-red-100/50' : 'border-blue-200 shadow-blue-100/50') }} shadow-lg rounded-2xl p-6">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full opacity-10 {{ $reRegistration->status === 'DISETUJUI' ? 'bg-emerald-500' : ($reRegistration->status === 'DITOLAK' ? 'bg-red-500' : 'bg-blue-500') }}"></div>
                        
                        <div class="flex items-center mb-4">
                            @if($reRegistration->status === 'DISETUJUI')
                                <div class="p-2 bg-emerald-100 text-emerald-600 rounded-lg mr-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                            @elseif($reRegistration->status === 'DITOLAK')
                                <div class="p-2 bg-red-100 text-red-600 rounded-lg mr-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </div>
                            @else
                                <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-4">
                                    <svg class="w-8 h-8 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                            @endif
                            <div>
                                <h4 class="text-lg font-black text-gray-800">Status Pemberkasan</h4>
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-widest mt-0.5">
                                    @if($reRegistration->status === 'DISETUJUI')
                                        <span class="text-emerald-600 font-black">VALID & DISETUJUI</span>
                                    @elseif($reRegistration->status === 'DITOLAK')
                                        <span class="text-red-600 font-black">DITOLAK/GAGAL</span>
                                    @else
                                        <span class="text-blue-600 font-black">MENUNGGU VERIFIKASI</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if($reRegistration->status === 'DISETUJUI')
                            <p class="text-sm text-gray-600 font-medium leading-relaxed">Selamat! Berkas dan registrasi ulang Anda telah diverifikasi oleh Panitia PMB. Anda telah resmi menjadi Mahasiswa Baru. <strong class="text-[#1E3A8A]">Admin akan meng-generate dan menginformasikan NIM Anda segera melalui portal ini.</strong> Pastikan untuk selalu memeriksa bagian "Profil Pendaftar" di sebelah kiri untuk melihat update NIM Anda.</p>
                        @elseif($reRegistration->status === 'DITOLAK')
                            <p class="text-sm text-gray-600 font-medium leading-relaxed">Mohon maaf, berkas daftar ulang Anda ditolak oleh panitia pendaftaran. Silahkan hubungi panitia PMB melalui kontak layanan kampus untuk informasi lebih lanjut mengenai masalah ini.</p>
                        @else
                            <p class="text-sm text-gray-600 font-medium leading-relaxed">Pemberkasan Anda berhasil diunggah dan sedang dalam antrean pengecekan panitia PMB. Harap untuk mengecek portal secara berkala guna melihat perubahan status registrasi ulang maupun penerbitan **NIM** Anda.</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
