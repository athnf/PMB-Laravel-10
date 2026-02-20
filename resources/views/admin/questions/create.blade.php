@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <a href="{{ route('admin.questions.index') }}" class="inline-flex items-center justify-center w-10 h-10 bg-white border border-gray-200 rounded-full shadow-sm text-gray-500 hover:text-[#2563EB] hover:border-[#2563EB] hover:bg-blue-50 transition-all duration-200" title="Kembali ke Bank Soal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-[#1E3A8A] tracking-tight">Tambah Soal Baru</h1>
        </div>
    </div>
    <p class="text-sm text-gray-500 font-medium ml-14">Masukkan parameter soal ujian, opsi pilihan ganda, dan kunci jawaban yang benar.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden max-w-4xl">
    <div class="p-8">
        <form action="{{ route('admin.questions.store') }}" method="POST">
            @csrf
            
            <div class="mb-8">
                <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Redaksi Pertanyaan <span class="text-red-500">*</span></label>
                <textarea name="question" required rows="4" placeholder="Tuliskan pertanyaan ujian di sini..." class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm leading-relaxed bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium"></textarea>
                <p class="mt-2 text-xs text-gray-400">Pastikan pertanyaan disusun dengan jelas dan tidak memiliki makna ganda.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 bg-gray-50 border border-gray-100 rounded-xl p-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">A.</span>
                        </div>
                        <input type="text" name="option_a" required placeholder="Masukkan pilihan jawaban A" class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">B.</span>
                        </div>
                        <input type="text" name="option_b" required placeholder="Masukkan pilihan jawaban B" class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">C.</span>
                        </div>
                        <input type="text" name="option_c" required placeholder="Masukkan pilihan jawaban C" class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">D.</span>
                        </div>
                        <input type="text" name="option_d" required placeholder="Masukkan pilihan jawaban D" class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
                    <select name="correct_answer" required class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] font-bold bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 sm:text-sm transition-all duration-300 cursor-pointer">
                        <option value="A">Opsi A</option>
                        <option value="B">Opsi B</option>
                        <option value="C">Opsi C</option>
                        <option value="D">Opsi D</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Bobot Nilai <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="number" name="weight" value="10" required min="1" max="100" class="appearance-none block w-full px-4 py-3 pr-16 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] font-bold bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <span class="text-xs font-bold text-gray-500">Poin</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end">
                <button type="submit" class="inline-flex justify-center items-center py-3.5 px-8 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    SIMPAN SOAL UJIAN
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
