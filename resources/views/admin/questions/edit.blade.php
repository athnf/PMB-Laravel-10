@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <a href="{{ route('admin.questions.index') }}" class="inline-flex items-center justify-center w-10 h-10 bg-white border border-gray-200 rounded-full shadow-sm text-gray-500 hover:text-[#2563EB] hover:border-[#2563EB] hover:bg-blue-50 transition-all duration-200" title="Kembali ke Bank Soal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-[#1E3A8A] tracking-tight">Edit Soal Ujian</h1>
        </div>
    </div>
    <p class="text-sm text-gray-500 font-medium ml-14">Perbarui parameter soal, teks pertanyaan, opsi jawaban, atau bobot nilai.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden max-w-4xl">
    <div class="p-8">
        <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="mb-8">
                <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Redaksi Pertanyaan <span class="text-red-500">*</span></label>
                <textarea name="question" required rows="4" class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm leading-relaxed bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium">{{ old('question', $question->question) }}</textarea>
                <p class="mt-2 text-xs text-gray-400">Pastikan pertanyaan disusun dengan jelas dan tidak memiliki makna ganda.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 bg-gray-50 border border-gray-100 rounded-xl p-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">A.</span>
                        </div>
                        <input type="text" name="option_a" value="{{ old('option_a', $question->option_a) }}" required class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">B.</span>
                        </div>
                        <input type="text" name="option_b" value="{{ old('option_b', $question->option_b) }}" required class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">C.</span>
                        </div>
                        <input type="text" name="option_c" value="{{ old('option_c', $question->option_c) }}" required class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-sm font-black text-gray-400">D.</span>
                        </div>
                        <input type="text" name="option_d" value="{{ old('option_d', $question->option_d) }}" required class="pl-10 appearance-none block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
                    <select name="correct_answer" required class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] font-bold bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 sm:text-sm transition-all duration-300 cursor-pointer">
                        <option value="A" {{ $question->correct_answer=='A'?'selected':'' }}>Opsi A</option>
                        <option value="B" {{ $question->correct_answer=='B'?'selected':'' }}>Opsi B</option>
                        <option value="C" {{ $question->correct_answer=='C'?'selected':'' }}>Opsi C</option>
                        <option value="D" {{ $question->correct_answer=='D'?'selected':'' }}>Opsi D</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Bobot Nilai <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="number" name="weight" value="{{ old('weight', $question->weight) }}" required min="1" max="100" class="appearance-none block w-full px-4 py-3 pr-16 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] font-bold bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <span class="text-xs font-bold text-gray-500">Poin</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end">
                <button type="submit" class="inline-flex justify-center items-center py-3.5 px-8 border border-transparent rounded-xl shadow-lg shadow-[#1E3A8A]/30 text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    PERBARUI SOAL UJIAN
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
