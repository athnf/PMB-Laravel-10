@extends('layouts.app')

@push('styles')
<style>
    body { background-color: #F8FAFC !important; color: #0F172A !important; }
</style>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
<div class="flex flex-col items-center min-h-[90vh] px-4 py-8 relative">
    
    <!-- Logo Area Top Left -->
    <div class="w-full max-w-6xl mb-12 flex justify-center md:justify-start">
        <div class="flex items-center space-x-4 bg-white px-5 py-3 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <!-- Fallback logo applied via onError inside img tag -->
            <img src="{{ asset('logo65.png') }}" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=SMKN+65&background=1E3A8A&color=fff&rounded=true&font-size=0.4&bold=true';" alt="Logo Sekolah" class="w-14 h-14 object-contain">
            <div class="text-left">
                <h3 class="font-black text-[#1E3A8A] text-xl leading-tight uppercase tracking-wider">SMK Negeri 65</h3>
                <p class="text-xs font-extrabold text-[#F59E0B] uppercase tracking-widest mt-0.5">Jakarta</p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="w-full max-w-6xl text-center md:text-left flex flex-col md:flex-row items-center gap-12 lg:gap-20">
        
        <!-- Left Side Texts and Buttons -->
        <div class="flex-1 space-y-8">
            <div class="inline-flex items-center justify-center md:justify-start space-x-2 bg-blue-50 border border-blue-100 rounded-full px-4 py-1.5 shadow-sm">
                <span class="flex h-2.5 w-2.5 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#F59E0B] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-[#F59E0B]"></span>
                </span>
                <span class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-widest">Proyek Ujian Sertifikasi Kompetensi</span>
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-[#0F172A] tracking-tighter leading-[1.1]">
                Sistem Penerimaan <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1E3A8A] to-[#2563EB]">Mahasiswa Baru</span> <br/>
                Berbasis Web
            </h1>
            
            <!-- Credit Section Profile -->
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm shadow-[#1E3A8A]/5 relative overflow-hidden group hover:border-blue-200 transition-colors duration-300 max-w-xl">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#2563EB]/5 rounded-bl-full transform group-hover:scale-110 transition-transform duration-500"></div>
                <div class="flex items-start space-x-5 relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 flex-shrink-0 border-2 border-white transform -rotate-3 group-hover:rotate-0 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="text-left pt-1">
                        <p class="text-[13px] font-bold text-gray-500 mb-1 leading-relaxed">Proyek ini dibuat sebagai bagian dari Ujian Sertifikasi Kompetensi atas nama:</p>
                        <h3 class="text-2xl font-black text-[#0F172A] uppercase tracking-wider mb-0.5">TRISTAN</h3>
                        <p class="text-sm font-extrabold text-[#F59E0B] inline-flex items-center">
                            Kelas XII PPLG <span class="mx-2 text-gray-300">|</span> SMK Negeri 65 Jakarta
                        </p>
                    </div>
                </div>
            </div>

            <!-- Call to action buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4 pt-2">
                <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex justify-center items-center py-4 px-10 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none transition-all duration-300 transform hover:-translate-y-1 tracking-wide">
                    MASUK KE SISTEM
                    <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                
                <button type="button" id="btn-tech-stack" class="w-full sm:w-auto inline-flex justify-center items-center py-4 px-10 border-2 border-gray-200 hover:border-[#2563EB] rounded-xl text-sm font-extrabold text-[#0F172A] bg-white hover:bg-blue-50 focus:outline-none transition-all duration-300 transform hover:-translate-y-1 tracking-wide group">
                    TECH STACK & CREDIT
                    <svg class="ml-3 w-5 h-5 text-gray-400 group-hover:text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </button>
            </div>
        </div>

        <!-- Right Side Illustration -->
        <div class="hidden md:flex flex-1 justify-end items-center relative">
            <div class="relative w-full max-w-md aspect-square bg-gradient-to-tr from-[#1E3A8A]/5 to-[#2563EB]/10 rounded-full flex items-center justify-center overflow-visible border-[12px] border-white shadow-2xl">
                <!-- Abstract pattern inside circle -->
                <div class="absolute inset-0 opacity-[0.15] bg-[radial-gradient(#1E3A8A_2px,transparent_2px)] [background-size:24px_24px] rounded-full"></div>
                
                <!-- Mockup Card Box -->
                <div class="w-[75%] h-[80%] bg-white rounded-3xl shadow-2xl flex flex-col p-6 border border-gray-100 transform rotate-6 hover:rotate-0 transition-transform duration-700 relative z-10 backdrop-blur-xl">
                    <div class="w-full h-8 bg-gray-50 rounded-lg mb-6 flex items-center px-4 space-x-2 border border-gray-100">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                    </div>
                    
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-blue-100"></div>
                        <div class="flex-1 space-y-2">
                            <div class="w-3/4 h-4 bg-gray-200 rounded-md"></div>
                            <div class="w-1/2 h-4 bg-gray-100 rounded-md"></div>
                        </div>
                    </div>

                    <div class="w-full h-4 bg-blue-50 rounded-md mb-3"></div>
                    <div class="w-5/6 h-4 bg-blue-50 rounded-md mb-3"></div>
                    <div class="w-full h-16 bg-gray-50 border border-gray-100 rounded-xl mb-8"></div>
                    
                    <div class="w-2/3 h-12 bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] rounded-xl mt-auto shadow-md shadow-[#2563EB]/40"></div>
                </div>

                <!-- Floating elements outside -->
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-[#F59E0B] rounded-full mix-blend-multiply filter blur-2xl opacity-70 animate-bounce" style="animation-duration: 4s;"></div>
                <div class="absolute -top-8 -right-8 w-32 h-32 bg-[#2563EB] rounded-full mix-blend-multiply filter blur-2xl opacity-60 animate-bounce" style="animation-duration: 5s; animation-delay: 1s;"></div>
            </div>
        </div>
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btn-tech-stack').addEventListener('click', function() {
            Swal.fire({
                title: '<span style="color: #1E3A8A; font-weight: 900; font-size: 26px;">Teknologi & Engine</span>',
                html: `
                    <div style="text-align: left; padding: 5px 15px; font-size: 15px; color: #4B5563; line-height: 1.8; border-radius: 16px; background: #F8FAFC; border: 1px solid #E5E7EB;">
                        <p style="margin-bottom: 20px; font-weight: 800; color: #0F172A; border-bottom: 2px solid #E5E7EB; padding-bottom: 10px;">Aplikasi ini dibangun menggunakan:</p>
                        <ul style="list-style-type: none; padding-left: 0; margin: 0; font-weight: 700;">
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <img src="https://cdn.simpleicons.org/laravel/FF2D20" width="24" height="24" style="margin-right: 16px; filter: drop-shadow(0px 2px 3px rgba(255,45,32,0.3));" alt="Laravel">
                                <span style="font-size: 16px; color: #0F172A;">Laravel 10</span>
                            </li>
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <img src="https://cdn.simpleicons.org/php/777BB4" width="24" height="24" style="margin-right: 16px;" alt="PHP">
                                <span style="font-size: 16px; color: #0F172A;">PHP 8.2+</span>
                            </li>
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <img src="https://cdn.simpleicons.org/mysql/4479A1" width="24" height="24" style="margin-right: 16px;" alt="MySQL">
                                <span style="font-size: 16px; color: #0F172A;">MySQL Database</span>
                            </li>
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <img src="https://cdn.simpleicons.org/laravel/FF2D20" width="24" height="24" style="margin-right: 16px;" alt="Blade">
                                <span style="font-size: 16px; color: #0F172A;">Blade Template Engine</span>
                            </li>
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <img src="https://cdn.simpleicons.org/tailwindcss/06B6D4" width="24" height="24" style="margin-right: 16px;" alt="Tailwind CSS">
                                <span style="font-size: 16px; color: #0F172A;">TailwindCSS Framework</span>
                            </li>
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <img src="https://cdn.simpleicons.org/javascript/F7DF1E" width="24" height="24" style="margin-right: 16px;" alt="JavaScript">
                                <span style="font-size: 16px; color: #0F172A;">SweetAlert2 & JS AJAX</span>
                            </li>
                            <li style="margin-bottom: 14px; display: flex; align-items: center;">
                                <div style="width: 24px; height: 24px; margin-right: 16px; border-radius: 6px; background: #6366F1; color: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 4px rgba(99,102,241,0.3);">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <span style="font-size: 16px; color: #0F172A;">Role Based Access (RBAC)</span>
                            </li>
                            <li style="margin-bottom: 6px; display: flex; align-items: center;">
                                <div style="width: 24px; height: 24px; margin-right: 16px; border-radius: 6px; background: #14B8A6; color: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 4px rgba(20,184,166,0.3);">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.956 11.956 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <span style="font-size: 16px; color: #0F172A;">Sistem Ujian Anti-Cheat Session</span>
                            </li>
                        </ul>
                    </div>
                `,
                icon: 'info',
                iconColor: '#2563EB',
                confirmButtonText: 'Tutup Info',
                confirmButtonColor: '#1E3A8A',
                customClass: {
                    popup: 'rounded-2xl border border-gray-100 shadow-2xl',
                    confirmButton: 'rounded-xl font-extrabold px-8 py-3.5 tracking-wide text-sm',
                },
                width: '600px',
                padding: '1em 1em 2em 1em'
            });
        });
    });
</script>
@endsection
