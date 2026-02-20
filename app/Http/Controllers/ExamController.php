<?php

namespace App\Http\Controllers;

use App\Models\ExamSession;
use App\Models\TestQuestion;
use App\Models\TestAnswer;
use App\Models\TestResult;
use App\Models\ExamLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ExamController extends Controller
{
    private $examDuration = 60; // 60 minutes
    private $maxViolations = 2; // 1st is warning, 2nd violation -> FAIL

    public function show()
    {
        $user = Auth::user();
        $session = $user->examSession;

        if (!$session) {
            if ($user->profile->test_status === 'SELESAI') {
                return redirect()->route('student.dashboard')->with('error', 'Anda sudah menyelesaikan ujian.');
            }
            return view('student.exam.start');
        }

        // Middleware already checks if FAILED or FINISHED, but let's be sure.
        if ($session->exam_status !== 'ACTIVE' || $session->is_locked) {
            return redirect()->route('student.dashboard')->with('error', 'Ujian Anda tidak aktif atau sudah dikunci.');
        }

        // Detect Page Refresh
        // If 'exam_started' flag isn't in Laravel session, it means they refreshed the page directly!
        if (!session('exam_started')) {
            $this->failAndLockExam($session, 'Halaman direfresh (Reload).');
            return redirect()->route('student.dashboard')->with('error', 'Ujian DIBATALKAN otomatis karena Anda me-refresh halaman.');
        }

        $questionsData = session()->get('exam_questions_' . $user->id);

        if (!$questionsData) {
            $questions = TestQuestion::inRandomOrder()->get();
            $questionsData = [];
            foreach ($questions as $q) {
                $options = ['A' => $q->option_a, 'B' => $q->option_b, 'C' => $q->option_c, 'D' => $q->option_d];
                $keys = array_keys($options);
                shuffle($keys);
                $shuffledOptions = [];
                foreach ($keys as $k) {
                    $shuffledOptions[$k] = $options[$k];
                }

                $questionsData[] = [
                    'id' => $q->id,
                    'question' => $q->question,
                    'options' => $shuffledOptions,
                    'correct_key' => $q->correct_answer
                ];
            }
            session()->put('exam_questions_' . $user->id, $questionsData);
        }

        $existingAnswers = TestAnswer::where('user_id', $user->id)->pluck('answer', 'question_id')->toArray();

        return view('student.exam.active', compact('session', 'questionsData', 'existingAnswers'));
    }

    public function start(Request $request)
    {
        $user = Auth::user();

        if ($user->profile->test_status === 'SELESAI') {
            return redirect()->route('student.dashboard')->with('error', 'Ujian sudah selesai.');
        }

        if (!$user->examSession) {
            ExamSession::create([
                'user_id' => $user->id,
                'session_id' => \Illuminate\Support\Facades\Session::getId(),
                'exam_token' => Str::random(32),
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addMinutes($this->examDuration),
                'violation_count' => 0,
                'is_locked' => false,
                'exam_status' => 'ACTIVE'
            ]);
        }

        // Set a flag to allow ONE load of the exam interface
        session(['exam_started' => true]);

        return redirect()->route('student.exam.show');
    }

    public function saveAnswer(Request $request)
    {
        $user = Auth::user();
        $session = $user->examSession;

        $request->validate([
            'question_id' => 'required|exists:test_questions,id',
            'answer' => 'required|string',
        ]);

        $question = TestQuestion::find($request->question_id);
        $reqAns = strtoupper(trim((string)$request->answer));
        $correctAns = strtoupper(trim((string)$question->correct_answer));

        $isCorrect = ($correctAns === $reqAns);

        TestAnswer::updateOrCreate(
        ['user_id' => $user->id, 'question_id' => $question->id],
        ['answer' => $reqAns, 'is_correct' => $isCorrect]
        );

        return response()->json(['success' => true]);
    }

    public function finish(Request $request)
    {
        $user = Auth::user();
        $session = $user->examSession;

        if ($session && $session->exam_status === 'ACTIVE') {
            $session->update([
                'is_locked' => true,
                'exam_status' => 'FINISHED'
            ]);
            $this->calculateScore($user);

            // Clear the refresh flag so they can't go back
            session()->forget('exam_started');
        }

        return redirect()->route('student.dashboard')->with('success', 'Ujian Telah Disubmit.');
    }

    public function logCheating(Request $request)
    {
        $user = Auth::user();
        $session = $user->examSession;

        if (!$session || $session->is_locked || $session->exam_status !== 'ACTIVE') {
            return response()->json(['locked' => true]);
        }

        $request->validate([
            'log_type' => 'required|string', // TAB_CHANGE, RELOAD, BLUR
        ]);

        ExamLog::create([
            'user_id' => $user->id,
            'log_type' => $request->log_type,
            'description' => 'Terdeteksi ' . $request->log_type,
        ]);

        $session->increment('violation_count');
        $violations = $session->violation_count;

        if ($violations >= $this->maxViolations) {
            $this->failAndLockExam($session, 'Ujian terkunci karena pelanggaran berulang/berat.');
            return response()->json(['locked' => true, 'message' => 'Ujian terkunci otomatis karena pelanggaran.']);
        }

        return response()->json(['locked' => false, 'warnings' => $violations]);
    }

    private function failAndLockExam($session, $reason)
    {
        $session->update([
            'is_locked' => true,
            'exam_status' => 'FAILED'
        ]);

        $this->calculateScore($session->user);

        ExamLog::create([
            'user_id' => $session->user_id,
            'log_type' => 'SECURITY_FAIL',
            'description' => $reason
        ]);

        session()->forget('exam_started');
    }

    private function calculateScore($user)
    {
        $answers = TestAnswer::where('user_id', $user->id)->get();
        $score = 0;

        foreach ($answers as $ans) {
            if ($ans->is_correct) {
                // Fetch weight
                $weight = TestQuestion::find($ans->question_id)->weight ?? 1;
                $score += $weight;
            }
        }

        TestResult::updateOrCreate(
        ['user_id' => $user->id],
        ['total_score' => $score, 'is_passed' => 'PENDING']
        );

        $user->profile->update(['test_status' => 'SELESAI']);
    }
}
