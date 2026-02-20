<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class , 'login']);

    Route::get('/register', [AuthController::class , 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class , 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [AdminController::class , 'dashboard'])->name('dashboard');

            Route::resource('users', AdminController::class)->except(['create', 'store', 'show']);
            Route::post('/users/{user}/evaluate', [AdminController::class , 'evaluate'])->name('users.evaluate');
            Route::post('/users/{user}/approve-re-registration', [AdminController::class , 'approveReRegistration'])->name('users.approve_re_registration');
            Route::post('/users/{user}/generate-nim', [AdminController::class , 'generateNim'])->name('users.generate_nim');

            // Explicit routes for questions
            Route::get('/questions', [AdminController::class , 'questionsIndex'])->name('questions.index');
            Route::get('/questions/create', [AdminController::class , 'questionsCreate'])->name('questions.create');
            Route::post('/questions', [AdminController::class , 'questionsStore'])->name('questions.store');
            Route::get('/questions/{question}/edit', [AdminController::class , 'questionsEdit'])->name('questions.edit');
            Route::put('/questions/{question}', [AdminController::class , 'questionsUpdate'])->name('questions.update');
            Route::delete('/questions/{question}', [AdminController::class , 'questionsDestroy'])->name('questions.destroy');
        }
        );

        // Student Routes
        Route::middleware('role:user')->prefix('student')->name('student.')->group(function () {
            Route::get('/dashboard', [StudentController::class , 'dashboard'])->name('dashboard');

            // Re-Registration
            Route::post('/re-register', [StudentController::class , 'reRegister'])->name('re-register');

            // Exam
            Route::middleware('exam.anticheat')->group(function () {
                    Route::get('/exam', [ExamController::class , 'show'])->name('exam.show');
                    Route::post('/exam/start', [ExamController::class , 'start'])->name('exam.start');
                    Route::post('/exam/save', [ExamController::class , 'saveAnswer'])->name('exam.save');
                    Route::post('/exam/finish', [ExamController::class , 'finish'])->name('exam.finish');
                    Route::post('/exam/log', [ExamController::class , 'logCheating'])->name('exam.log');
                }
                );
            }
            );
        });
