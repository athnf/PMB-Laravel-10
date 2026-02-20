<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReRegistration;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $profile = $user->profile;
        $studentId = $user->studentId;
        $result = $user->result;
        $reRegistration = $user->reRegistration;

        return view('student.dashboard', compact('user', 'profile', 'studentId', 'result', 'reRegistration'));
    }

    public function reRegister(Request $request)
    {
        $request->validate([
            'confirmation' => 'required',
            'payment_proof' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ]);

        $user = Auth::user();

        $path = null;
        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payments', 'public');
        }

        $data = [
            'confirmation' => true,
            'status' => 'MENUNGGU'
        ];

        if ($path) {
            $data['payment_proof'] = $path;
        }

        ReRegistration::updateOrCreate(
        ['user_id' => $user->id],
            $data
        );

        return redirect()->back()->with('success', 'Berhasil submit daftar ulang');
    }
}
