<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\StudentId;
use App\Models\TestResult;
use App\Models\ReRegistration;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::whereHas('role', function ($q) {
            $q->where('name', 'user');
        })->get();

        $stats = [
            'total_pendaftar' => $users->count(),
            'total_ikut_ujian' => $users->filter(fn($u) => $u->profile->test_status === 'SELESAI')->count(),
            'total_lulus' => TestResult::where('is_passed', 'LULUS')->count(),
            'total_gagal' => TestResult::where('is_passed', 'TIDAK LULUS')->count(),
            'total_daftar_ulang' => ReRegistration::count(),
            'total_mahasiswa' => StudentId::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function index()
    {
        $users = User::with(['profile', 'result', 'reRegistration', 'studentId'])
            ->whereHas('role', fn($q) => $q->where('name', 'user'))
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->profile()->update([
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted');
    }

    public function evaluate(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:LULUS,TIDAK LULUS',
            'notes' => 'nullable|string'
        ]);

        $result = $user->result;
        if ($result) {
            $result->update([
                'is_passed' => $request->status,
                'admin_notes' => $request->notes,
            ]);
        }
        return redirect()->back()->with('success', 'Evaluation saved');
    }

    public function approveReRegistration(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:DISETUJUI,DITOLAK'
        ]);

        if ($user->reRegistration) {
            $user->reRegistration->update([
                'status' => $request->status
            ]);
        }
        return redirect()->back()->with('success', 'Re-registration updated');
    }

    public function generateNim(Request $request, User $user)
    {
        if ($user->reRegistration && $user->reRegistration->status === 'DISETUJUI' && !$user->studentId) {
            $count = StudentId::count() + 1;
            $nim = 'NIM-' . date('Y') . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

            StudentId::create([
                'user_id' => $user->id,
                'nim' => $nim,
            ]);

            return redirect()->back()->with('success', 'NIM Generated: ' . $nim);
        }

        return redirect()->back()->with('error', 'Cannot generate NIM');
    }

    // QUESTIONS
    public function questionsIndex()
    {
        $questions = TestQuestion::paginate(10);
        return view('admin.questions.index', compact('questions'));
    }

    public function questionsCreate()
    {
        return view('admin.questions.create');
    }

    public function questionsStore(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
            'weight' => 'required|integer|min:1',
        ]);
        TestQuestion::create($data);
        return redirect()->route('admin.questions.index')->with('success', 'Question created');
    }

    public function questionsEdit(TestQuestion $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function questionsUpdate(Request $request, TestQuestion $question)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
            'weight' => 'required|integer|min:1',
        ]);
        $question->update($data);
        return redirect()->route('admin.questions.index')->with('success', 'Question updated');
    }

    public function questionsDestroy(TestQuestion $question)
    {
        $question->delete();
        return redirect()->back()->with('success', 'Question deleted');
    }
}
