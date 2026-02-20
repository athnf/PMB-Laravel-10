@extends('layouts.admin')

@section('content')
<div x-data="questionManager()" class="mb-8 relative">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-[#1E3A8A] mb-2 tracking-tight">Manajemen Bank Soal</h1>
            <p class="text-sm text-gray-500 font-medium">Kelola pertanyaan ujian, pilihan ganda, kunci jawaban, dan distribusi bobot nilai.</p>
        </div>
        <div>
            <button @click="openCreate()" class="inline-flex items-center justify-center py-2.5 px-5 border border-transparent rounded-xl shadow-sm text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Soal Baru
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50/50 border-b border-gray-100 text-gray-500 uppercase tracking-wider text-[11px] font-bold">
                    <tr>
                        <th scope="col" class="px-6 py-4 w-16 text-center">No</th>
                        <th scope="col" class="px-6 py-4 w-1/2">Pertanyaan Ujian & Opsi Rekam</th>
                        <th scope="col" class="px-6 py-4 text-center">Kunci Valid</th>
                        <th scope="col" class="px-6 py-4 text-center">Skala Bobot</th>
                        <th scope="col" class="px-6 py-4 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($questions as $index => $question)
                    <tr class="hover:bg-blue-50/50 transition-colors group">
                        <td class="px-6 py-5 text-center font-bold text-gray-400">
                            {{ $questions->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-5">
                            <div class="text-[13px] font-extrabold text-[#0F172A] mb-3 leading-loose">{{ $question->question }}</div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-xs font-medium">
                                <div class="flex items-start {{ $question->correct_answer === 'A' ? 'text-emerald-700 bg-emerald-50 border-emerald-100' : 'text-gray-600 border-gray-100' }} border p-2 rounded-lg">
                                    <span class="font-extrabold w-5 flex-shrink-0 {{ $question->correct_answer === 'A' ? 'text-emerald-600' : 'text-gray-400' }}">A.</span>
                                    <span>{{ $question->option_a }}</span>
                                </div>
                                <div class="flex items-start {{ $question->correct_answer === 'B' ? 'text-emerald-700 bg-emerald-50 border-emerald-100' : 'text-gray-600 border-gray-100' }} border p-2 rounded-lg">
                                    <span class="font-extrabold w-5 flex-shrink-0 {{ $question->correct_answer === 'B' ? 'text-emerald-600' : 'text-gray-400' }}">B.</span>
                                    <span>{{ $question->option_b }}</span>
                                </div>
                                <div class="flex items-start {{ $question->correct_answer === 'C' ? 'text-emerald-700 bg-emerald-50 border-emerald-100' : 'text-gray-600 border-gray-100' }} border p-2 rounded-lg">
                                    <span class="font-extrabold w-5 flex-shrink-0 {{ $question->correct_answer === 'C' ? 'text-emerald-600' : 'text-gray-400' }}">C.</span>
                                    <span>{{ $question->option_c }}</span>
                                </div>
                                <div class="flex items-start {{ $question->correct_answer === 'D' ? 'text-emerald-700 bg-emerald-50 border-emerald-100' : 'text-gray-600 border-gray-100' }} border p-2 rounded-lg">
                                    <span class="font-extrabold w-5 flex-shrink-0 {{ $question->correct_answer === 'D' ? 'text-emerald-600' : 'text-gray-400' }}">D.</span>
                                    <span>{{ $question->option_d }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 font-extrabold text-sm border border-emerald-200 shadow-sm">
                                {{ $question->correct_answer }}
                            </span>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md bg-blue-100 text-[#1E3A8A] font-bold text-xs border border-blue-200 shadow-sm">
                                {{ $question->weight }} Point
                            </span>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <div class="flex items-center justify-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <!-- Tombol Edit -->
                                <button type="button" @click="openEdit({{ json_encode($question) }})" class="text-amber-500 hover:text-amber-700 hover:bg-amber-50 p-2 rounded-lg transition-colors border border-transparent hover:border-amber-200" title="Edit Soal">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>

                                <!-- Tombol Hapus -->
                                <button type="button" @click="confirmDelete('{{ $question->id }}')" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors border border-transparent hover:border-red-200" title="Hapus Soal">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-400 font-medium">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Belum ada soal ujian. Klik tombol "Tambah Soal Baru" untuk mulai membuat pertanyaan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($questions->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            {{ $questions->links() }}
        </div>
        @endif
    </div>

    <!-- CREATE/EDIT MODAL OVERLAY -->
    <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background backdrop -->
            <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm transition-opacity" @click="isModalOpen = false" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal Panel -->
            <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl w-full border border-gray-100">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-8">
                    <!-- Header Modal -->
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                        <h3 class="text-2xl leading-6 font-extrabold text-[#1E3A8A]" id="modal-title" x-text="mode === 'create' ? 'Buat Soal Ujian Baru' : 'Perbarui Soal Ujian'"></h3>
                        <button type="button" @click="isModalOpen = false" class="bg-gray-100 rounded-lg p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            <span class="sr-only">Tutup</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    <!-- Form Content -->
                    <form :action="formAction" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" x-show="mode === 'edit'" :disabled="mode === 'create'">

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Redaksi Pertanyaan <span class="text-red-500">*</span></label>
                            <textarea name="question" x-model="formData.question" required rows="3" placeholder="Tuliskan pertanyaan ujian di sini..." class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm leading-relaxed bg-gray-50 text-[#0F172A] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300 font-medium"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 bg-gray-50 border border-gray-100 rounded-xl p-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Opsi A <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><span class="text-xs font-black text-gray-400">A.</span></div>
                                    <input type="text" name="option_a" x-model="formData.option_a" required placeholder="Jawaban A" class="pl-8 appearance-none block w-full px-3 py-2.5 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] text-sm transition-all duration-300">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Opsi B <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><span class="text-xs font-black text-gray-400">B.</span></div>
                                    <input type="text" name="option_b" x-model="formData.option_b" required placeholder="Jawaban B" class="pl-8 appearance-none block w-full px-3 py-2.5 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] text-sm transition-all duration-300">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Opsi C <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><span class="text-xs font-black text-gray-400">C.</span></div>
                                    <input type="text" name="option_c" x-model="formData.option_c" required placeholder="Jawaban C" class="pl-8 appearance-none block w-full px-3 py-2.5 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] text-sm transition-all duration-300">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Opsi D <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><span class="text-xs font-black text-gray-400">D.</span></div>
                                    <input type="text" name="option_d" x-model="formData.option_d" required placeholder="Jawaban D" class="pl-8 appearance-none block w-full px-3 py-2.5 border border-gray-200 rounded-lg shadow-sm text-[#0F172A] focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] text-sm transition-all duration-300">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
                                <select name="correct_answer" x-model="formData.correct_answer" required class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] font-bold bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 sm:text-sm transition-all duration-300 cursor-pointer">
                                    <option value="A">Opsi A</option>
                                    <option value="B">Opsi B</option>
                                    <option value="C">Opsi C</option>
                                    <option value="D">Opsi D</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-[#0F172A] mb-2 uppercase tracking-wide">Bobot Nilai <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="number" name="weight" x-model="formData.weight" required min="1" max="100" class="appearance-none block w-full px-4 py-3 pr-16 border border-gray-200 rounded-xl shadow-sm text-[#0F172A] font-bold bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#2563EB]/50 focus:border-[#2563EB] sm:text-sm transition-all duration-300">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-xs font-bold text-gray-500">Poin</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 flex flex-col sm:flex-row-reverse space-y-3 sm:space-y-0 sm:space-x-3 sm:space-x-reverse border-t border-gray-100 mt-6">
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center py-3 px-6 border border-transparent rounded-xl shadow-md text-sm font-extrabold text-white bg-gradient-to-r from-[#1E3A8A] to-[#2563EB] hover:from-[#172e6b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300 transform hover:-translate-y-0.5">
                                <svg x-show="mode === 'create'" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                <svg x-show="mode === 'edit'" style="display:none;" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                <span x-text="mode === 'create' ? 'SIMPAN SOAL' : 'SIMPAN PERUBAHAN'"></span>
                            </button>
                            <button type="button" @click="isModalOpen = false" class="w-full sm:w-auto inline-flex justify-center items-center py-3 px-6 border border-gray-300 rounded-xl shadow-sm text-sm font-bold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] transition-all duration-300">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('questionManager', () => ({
            isModalOpen: false,
            mode: 'create', // 'create' or 'edit'
            formAction: '{{ route('admin.questions.store') }}',
            formData: {
                id: '',
                question: '',
                option_a: '',
                option_b: '',
                option_c: '',
                option_d: '',
                correct_answer: 'A',
                weight: 10
            },
            
            openCreate() {
                this.mode = 'create';
                this.formAction = '{{ route('admin.questions.store') }}';
                this.formData = {
                    id: '',
                    question: '',
                    option_a: '',
                    option_b: '',
                    option_c: '',
                    option_d: '',
                    correct_answer: 'A',
                    weight: 10
                };
                this.isModalOpen = true;
            },
            
            openEdit(question) {
                this.mode = 'edit';
                this.formAction = `/admin/questions/${question.id}`;
                this.formData = {
                    id: question.id,
                    question: question.question,
                    option_a: question.option_a,
                    option_b: question.option_b,
                    option_c: question.option_c,
                    option_d: question.option_d,
                    correct_answer: question.correct_answer,
                    weight: question.weight
                };
                this.isModalOpen = true;
            },
            
            confirmDelete(id) {
                Swal.fire({
                    title: 'Peringatan Hapus!',
                    text: 'Yakin ingin menghapus soal ujian ini dari database server? Tindakan ini tidak dapat dibatalkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Eksekusi Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = `/admin/questions/${id}`;
                        form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        }));
    });
</script>
@endpush
