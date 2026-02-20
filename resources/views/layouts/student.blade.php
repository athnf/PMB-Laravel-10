<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem PMB - Portal Mahasiswa Baru</title>
    <link rel="icon" href="{{ asset('logo65.png') }}" type="image/x-icon">
    <!-- Script Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- AlpineJS for interactive elements -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body { background-color: #F8FAFC !important; color: #0F172A !important; }
        /* Active nav item */
        .nav-item-active { background-color: rgba(37, 99, 235, 0.1); border-right: 4px solid #F59E0B; color: #1E3A8A; font-weight: 700; }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased text-[#0F172A] bg-[#F8FAFC]" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Mobile Sidebar Backdrop -->
        <div x-show="sidebarOpen" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" @click="sidebarOpen = false" style="display: none;"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-white border-r border-gray-200 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-xl">
            <!-- Brand -->
            <div class="flex items-center justify-center h-20 border-b border-gray-100 bg-[#1E3A8A]">
                <div class="flex items-center space-x-3">
                    <svg class="w-8 h-8 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    <span class="text-white font-extrabold text-xl tracking-wider">PMB PORTAL</span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('student.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-blue-50 hover:text-[#2563EB] transition-colors {{ request()->routeIs('student.dashboard') ? 'nav-item-active' : '' }}">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                @if(Auth::user()->profile && Auth::user()->profile->test_status !== 'SELESAI')
                <!--
                <a href="{{ route('student.exam.show') }}" class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-blue-50 hover:text-[#2563EB] transition-colors {{ request()->routeIs('student.exam*') ? 'nav-item-active' : '' }}">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="font-medium">Ujian Masuk</span>
                </a>
                -->
                @endif
            </nav>
            
            <div class="p-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-600 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="font-bold">Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 w-full overflow-hidden bg-[#F8FAFC]">
            
            <!-- Top Header -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200 lg:justify-end shadow-sm z-10">
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="flex items-center space-x-4">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="font-bold text-[#1E3A8A] hidden md:block">Halo, Kandidat {{ Auth::user()->name }}</span>
                            <div class="w-10 h-10 rounded-full bg-[#1E3A8A] text-white flex justify-center items-center font-extrabold shadow-md ring-2 ring-white">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </button>
                        
                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" style="display: none;" class="absolute right-0 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl z-20 border border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F8FAFC] hover:text-[#2563EB] font-medium border-b border-gray-50">Logout Akun</a>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Scrollable Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#F8FAFC] p-4 md:p-6 lg:p-8">
                <!-- Flash Messages Handled via SweetAlert2 Below -->
                <div class="w-full">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#1E3A8A'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Perhatian',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#1E3A8A'
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    icon: 'warning',
                    title: 'Periksa Input Form',
                    html: `
                        <ul style="text-align: left; margin-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                    confirmButtonColor: '#1E3A8A'
                });
            @endif
        });
    </script>
</body>
</html>
