<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ujian Online</title>
    <!-- Script Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#F8FAFC] font-sans text-gray-900 select-none overflow-x-hidden" oncontextmenu="return false;">
    <script>
        // Store token in global JS variable to pass to header
        window.EXAM_TOKEN = "{{ $session->exam_token }}";
    </script>
    
    <!-- Top Progress Bar / Header -->
    <div class="fixed top-0 w-full bg-white shadow-md shadow-blue-900/5 py-4 px-6 z-50 flex flex-col md:flex-row justify-between items-center border-t-4 border-[#2563EB]">
        <div class="flex items-center space-x-3 mb-2 md:mb-0">
            <div class="bg-blue-100 p-2 rounded-lg text-[#1E3A8A]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
            <div>
                <div class="font-black text-lg text-[#0F172A] leading-tight">PMB UJIAN ONLINE</div>
                <div class="text-xs font-bold text-gray-500">Live Session Aktif!</div>
            </div>
        </div>
        <div class="flex items-center space-x-6">
            <div class="bg-red-50 px-4 py-2 rounded-xl border border-red-100 flex items-center shadow-inner">
                <svg class="w-5 h-5 text-red-500 mr-2 animate-spin" style="animation-duration: 3s;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm font-bold text-red-800 uppercase tracking-wider">Sisa Waktu:</span>
                <span id="timer" class="font-mono font-black text-red-600 text-xl ml-2 tracking-tight">00:00:00</span>
            </div>
            <form action="{{ route('student.exam.finish') }}" method="POST" id="finishForm">
                @csrf
                <input type="hidden" name="exam_token" value="{{ $session->exam_token }}">
                <button type="button" onclick="confirmSubmit()" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-extrabold text-white transition-all duration-200 bg-gradient-to-r from-emerald-500 to-emerald-600 border border-transparent rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-600 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    SELESAI UJIAN
                </button>
            </form>
        </div>
    </div>

    <!-- Main Workspace -->
    <div class="pt-32 pb-12 px-4 max-w-6xl mx-auto" x-data="{ currentQuestion: 0 }">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Left Side: Navigation Map -->
            <div class="lg:col-span-4 order-2 lg:order-1">
                <div class="bg-white shadow-xl shadow-blue-900/5 rounded-2xl border border-gray-100 sticky top-32 overflow-hidden">
                    <div class="p-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                        <h4 class="font-extrabold text-[#0F172A] flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Navigasi Panel
                        </h4>
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-5 gap-2">
                            @foreach($questionsData as $index => $q)
                            @php
                                $isAnswered = isset($existingAnswers[$q['id']]);
                            @endphp
                            <button @click="currentQuestion = {{ $index }}" 
                                class="w-full aspect-square rounded-xl flex items-center justify-center font-bold text-sm transition-all shadow-sm
                                {{ $isAnswered ? 'bg-gradient-to-br from-indigo-500 to-[#1E3A8A] text-white border-transparent' : 'bg-white text-gray-600 border border-gray-200 hover:border-indigo-400 hover:bg-indigo-50' }}" 
                                :class="{'ring-4 ring-indigo-200 ring-offset-1 scale-105 transform': currentQuestion === {{ $index }}}">
                                {{ $index + 1 }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Question Area -->
            <div class="lg:col-span-8 order-1 lg:order-2">
                <div class="bg-white shadow-2xl shadow-blue-900/5 rounded-3xl border border-gray-100 overflow-hidden relative">
                    <!-- Progress top bar -->
                    <div class="h-1.5 w-full bg-gray-100 relative">
                        <div class="absolute top-0 left-0 h-full bg-[#2563EB] transition-all duration-300" :style="`width: ${((currentQuestion + 1) / {{ count($questionsData) }}) * 100}%`"></div>
                    </div>

                    <div class="p-5 md:p-8">
                        @foreach($questionsData as $index => $q)
                            <div x-show="currentQuestion === {{ $index }}" class="question-block" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                style="display: none;">
                                
                                <div class="mb-6 flex justify-between items-center bg-blue-50/50 p-3 rounded-xl border border-blue-50">
                                    <span class="text-[#1E3A8A] font-black tracking-wide">PERTANYAAN NO. {{ $index + 1 }}</span>
                                    <span class="text-xs font-bold text-gray-400">Total {{ count($questionsData) }} Soal</span>
                                </div>
                                
                                <div class="text-[17px] font-semibold text-[#0F172A] mb-8 leading-relaxed max-w-none">
                                    {{ $q['question'] }}
                                </div>
                                
                                <div class="space-y-4">
                                    @foreach($q['options'] as $key => $option)
                                    @php
                                        $isChecked = isset($existingAnswers[$q['id']]) && $existingAnswers[$q['id']] === $key;
                                    @endphp
                                    <label class="group flex items-start p-4 md:p-5 border-2 rounded-2xl cursor-pointer transition-all duration-200 
                                            {{ $isChecked ? 'bg-indigo-50/80 border-[#2563EB]' : 'bg-white border-gray-100 hover:border-indigo-300 hover:bg-gray-50' }}">
                                        
                                        <div class="relative flex items-center justify-center mt-0.5">
                                            <input type="radio" name="answer_{{ $q['id'] }}" value="{{ $key }}" 
                                                class="peer sr-only answer-radio" data-qid="{{ $q['id'] }}" {{ $isChecked ? 'checked' : '' }} 
                                                onclick="saveAnswer({{ $q['id'] }}, '{{ $key }}')">
                                            
                                            <div class="w-6 h-6 rounded-full border-2 border-gray-300 peer-checked:border-[#2563EB] peer-checked:bg-[#2563EB] flex items-center justify-center transition-all bg-white">
                                                <svg class="w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="ml-4 text-[15px] font-medium text-gray-700 group-hover:text-gray-900 {{ $isChecked ? 'text-[#0F172A] font-bold' : '' }} flex-1">
                                            <span class="font-extrabold mr-1.5 text-gray-400 group-hover:text-indigo-400 {{ $isChecked ? 'text-[#2563EB]' : '' }}">{{ $key }}.</span> 
                                            {{ $option }}
                                        </span>
                                    </label>
                                    @endforeach
                                </div>

                                <div class="flex justify-between items-center mt-10 pt-6 border-t border-gray-100">
                                    <button type="button" @click="if(currentQuestion > 0) currentQuestion--" 
                                        class="px-5 py-2.5 bg-white text-gray-700 border border-gray-200 shadow-sm rounded-xl hover:bg-gray-50 font-bold transition-all flex items-center disabled:opacity-50 disabled:cursor-not-allowed" 
                                        :disabled="currentQuestion === 0">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                                        Sebelumnya
                                    </button>
                                    
                                    <button type="button" @click="if(currentQuestion < {{ count($questionsData) - 1 }}) currentQuestion++" 
                                        class="px-6 py-2.5 bg-[#1E3A8A] text-white shadow-md shadow-[#1E3A8A]/30 rounded-xl hover:bg-[#172e6b] font-bold transition-all flex items-center disabled:opacity-50 disabled:cursor-not-allowed" 
                                        :disabled="currentQuestion === {{ count($questionsData) - 1 }}">
                                        Selanjutnya
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Security Overlay -->
    <div id="violationOverlay" class="fixed inset-0 bg-[#0F172A] z-[100] flex flex-col justify-center items-center text-white hidden backdrop-blur-md">
        <div class="w-24 h-24 bg-red-500/20 rounded-full flex items-center justify-center mb-6 animate-pulse">
            <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <h1 class="text-4xl font-black mb-2 text-white tracking-tight">UJIAN DIHENTIKAN!</h1>
        <p class="text-lg text-gray-300 font-medium">Sistem Anti-Cheat mendeteksi anomali pada aktivitas browser Anda.</p>
        <div class="mt-8 bg-black/30 p-4 rounded-xl border border-white/10 max-w-lg text-center">
            <p class="text-sm text-gray-400 font-mono" id="violationMsg">Telah melanggar batas perpindahan Window/Tab</p>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Exam-Token': window.EXAM_TOKEN
            }
        });

        // Timer
        const endTime = new Date("{{ $session->end_time->toIso8601String() }}").getTime();
        const timerEl = document.getElementById('timer');
        let isSubmitting = false;

        const timerInterval = setInterval(() => {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance < 0) {
                clearInterval(timerInterval);
                timerEl.innerHTML = "WAKTU HABIS!";
                if (!isSubmitting) {
                    isSubmitting = true;
                    Swal.fire({
                        icon: 'info',
                        title: 'Waktu Habis!',
                        text: 'Jawaban Anda akan disubmit otomatis.',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        document.getElementById('finishForm').submit();
                    });
                }
                return;
            }

            // Warning approaching timeout (e.g., 5 mins)
            if (distance < 300000 && distance > 299000 && !timerEl.classList.contains('animate-pulse')) {
                timerEl.classList.add('animate-pulse');
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Waktu tersisa kurang dari 5 menit!',
                    showConfirmButton: false,
                    timer: 5000
                });
            }

            const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((distance % (1000 * 60)) / 1000);

            timerEl.innerHTML =  h.toString().padStart(2, '0') + ":" + 
                                 m.toString().padStart(2, '0') + ":" + 
                                 s.toString().padStart(2, '0');
        }, 1000);

        // Autosave
        function saveAnswer(qId, answer) {
            $.post("{{ route('student.exam.save') }}", { question_id: qId, answer: answer })
             .fail(function(xhr) {
                 if(xhr.status === 403 && xhr.responseJSON) {
                     handleFatalCheat(xhr.responseJSON.message);
                 } else {
                     Swal.fire({toast: true, position: 'top-end', icon: 'error', title: 'Gagal otomatis menyimpan jawaban. Periksa koneksi!', showConfirmButton: false, timer: 3000});
                 }
             });
        }

        function confirmSubmit() {
            Swal.fire({
                title: 'Konfirmasi Submit',
                text: "Apakah Anda yakin ingin menyelesaikan ujian? Anda tidak bisa kembali lagi.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Submit Terakhir!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    isSubmitting = true;
                    document.getElementById('finishForm').submit();
                }
            });
        }

        // Anti-Cheat: Visibility & Blur
        let cheatTrackingActive = true;

        document.addEventListener("visibilitychange", function() {
            if (cheatTrackingActive && document.visibilityState === 'hidden') {
                triggerCheatLog('TAB_CHANGE');
            }
        });

        window.addEventListener("blur", function() {
            if (cheatTrackingActive) {
                triggerCheatLog('BLUR_WINDOW');
            }
        });

        function triggerCheatLog(type) {
            // Prevent spamming during the modal process
            cheatTrackingActive = false; 
            
            $.post("{{ route('student.exam.log') }}", { log_type: type })
             .done(function(data) {
                 if(data.locked) {
                     handleFatalCheat(data.message || "Ujian terkunci karena pelanggaran berulang/berat.");
                 } else {
                     Swal.fire({
                         icon: 'warning',
                         title: 'Peringatan Pelanggaran!',
                         text: 'Pindah tab/window dilarang! ' + (window.maxViolations ? 'Sekali lagi' : 'Ini peringatan terakhir') + '.',
                         confirmButtonText: 'Saya Mengerti',
                         allowOutsideClick: false
                     }).then(() => {
                         cheatTrackingActive = true; // resume tracking after modal
                     });
                 }
             })
             .fail(function(xhr) {
                 if(xhr.status === 403 && xhr.responseJSON && xhr.responseJSON.locked) {
                     handleFatalCheat(xhr.responseJSON.message);
                 } else {
                     cheatTrackingActive = true;
                 }
             });
        }

        function handleFatalCheat(msg) {
            cheatTrackingActive = false;
            clearInterval(timerInterval);
            Swal.fire({
                icon: 'error',
                title: 'Ujian Dibatalkan',
                text: msg,
                allowOutsideClick: false,
                showConfirmButton: true,
                confirmButtonText: 'Kembali ke Dashboard',
                confirmButtonColor: '#d33'
            }).then(() => {
                window.location.href = "{{ route('student.dashboard') }}";
            });
        }
    </script>
</body>
</html>
