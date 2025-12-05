<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_has_course extends Model
{
      protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'course_name',
    ];
}
