<?php

namespace App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request; 
use App\Models\student_has_courses;
use Illuminate\Support\Facades\Hash;
use Flasher\Laravel\Facade\Flasher;
class AdminController extends Controller
{
     public function dashboard()
     {
        $studentCount = User::role('Student')->count();
        $teacherCount = User::role('Teacher')->count();
        return view('admin.dashboard', compact('studentCount', 'teacherCount'));
     }
  public function profilestudent($id)
{
    // get student
    $student = User::findOrFail($id);

    // get student course info
    $student_course = student_has_courses::where('user_id', $id)->first();

    // if student has no course
    if(!$student_course){
        return view('Student.profilestudent', [
            'student' => $student,
            'student_course_name' => null,
            'course' => null
        ]);
    }

    // get actual course model
    $course = Course::find($student_course->course_id);

    return view('Student.profilestudent', [
        'student' => $student,
        'student_course_name' => $student_course->course_name,
        'course' => $course
    ]);
}

    public function editprofile($id)
    {
        $student = User::findOrFail($id);
        return view('Student.editprofile', compact('student'));
    }
    public function updateprofile(Request $request, $id)
    {
        $student = User::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();
        flash()->option('position', 'top-right')->success('Profile updated successfully');
        return redirect()->route('Student.profilestudent', ['id' => $student->id]);
    }
}