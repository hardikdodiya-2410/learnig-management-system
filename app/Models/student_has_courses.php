<?php

namespace App\Models;
use App\Models\User;
use App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class student_has_courses extends Model
{
     protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'course_name',
    ];
        public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
