<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $user = App\Models\User::has('examSession')->first();
    if (!$user) {
        echo "No user with exam session found\n";
        exit;
    }

    $session = $user->examSession;
    Auth::login($user);

    $req = Illuminate\Http\Request::create('/student/exam/save', 'POST', ['question_id' => 11, 'answer' => 'C']);
    $req->headers->set('X-Exam-Token', $session->exam_token);

    $controller = new App\Http\Controllers\ExamController();
    $res = $controller->saveAnswer($req);

    echo "Response: " . $res->getContent() . "\n";

    $answer = App\Models\TestAnswer::where('user_id', $user->id)->first();
    echo "is_correct: " . ($answer->is_correct ? 'TRUE' : 'FALSE') . "\n";
}
catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
