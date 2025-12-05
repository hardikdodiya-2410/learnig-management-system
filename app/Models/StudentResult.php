<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class StudentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'course_name',
        'marks',
        'total_marks',
        'percentage',
        'grade',
        'result',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}