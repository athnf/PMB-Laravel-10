<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function examSession()
    {
        return $this->hasOne(ExamSession::class);
    }

    public function result()
    {
        return $this->hasOne(TestResult::class);
    }

    public function reRegistration()
    {
        return $this->hasOne(ReRegistration::class);
    }

    public function studentId()
    {
        return $this->hasOne(StudentId::class);
    }

    public function examLogs()
    {
        return $this->hasMany(ExamLog::class);
    }

    public function testAnswers()
    {
        return $this->hasMany(TestAnswer::class);
    }
}
