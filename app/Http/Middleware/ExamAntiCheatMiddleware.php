<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExamAntiCheatMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user)
            return redirect()->route('login');

        // Allow start route to bypass some strict checks if they haven't started.
        // Even better, just don't apply this middleware to /exam/start, only to active exam routes.

        $session = $user->examSession;
        if (!$session) {
            if ($request->routeIs('student.exam.start') || $request->routeIs('student.exam.show')) {
                return $next($request);
            }
            return redirect()->route('student.dashboard')->with('error', 'Sesi ujian tidak ditemukan.');
        }

        // 1. Session ID Match Rule (Double Login / New Session override)
        if ($session->session_id && $session->session_id !== Session::getId()) {
            $this->failExam($session, 'Sesi ganda terdeteksi (Multi login).');
            return $this->respondError($request, 'Ujian dibatalkan karena terdeteksi login di perangkat atau browser lain.');
        }

        // 2. Token Validation
        // For non-GET requests (save, finish, log) we expect token
        if ($request->isMethod('POST') && !$request->routeIs('student.exam.start')) {
            $providedToken = $request->header('X-Exam-Token') ?? $request->input('exam_token');
            if ($providedToken !== $session->exam_token) {
                $this->failExam($session, 'Token ujian tidak valid.');
                return $this->respondError($request, 'Token ujian tidak valid. Ujian dibatalkan.');
            }
        }

        // 3. Status and Timeout Checks
        if ($session->exam_status === 'FAILED' || $session->is_locked) {
            return $this->respondError($request, 'Ujian Anda telah dibatalkan karena pelanggaran.');
        }

        if ($session->exam_status === 'FINISHED' || $user->profile->test_status === 'SELESAI') {
            return $this->respondError($request, 'Anda sudah menyelesaikan ujian.');
        }

        if (now()->greaterThan($session->end_time)) {
            $session->update(['exam_status' => 'FINISHED', 'is_locked' => true]);
            $user->profile->update(['test_status' => 'SELESAI']);
            return $this->respondError($request, 'Waktu ujian telah habis.');
        }

        return $next($request);
    }

    private function failExam($session, $reason)
    {
        $session->update([
            'is_locked' => true,
            'exam_status' => 'FAILED'
        ]);

        $session->user->profile->update([
            'test_status' => 'SELESAI'
        ]);

        \App\Models\ExamLog::create([
            'user_id' => $session->user_id,
            'log_type' => 'SECURITY_FAIL',
            'description' => $reason
        ]);
    }

    private function respondError(Request $request, $message)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => false, 'message' => $message, 'locked' => true], 403);
        }
        return redirect()->route('student.dashboard')->with('error', $message);
    }
}
