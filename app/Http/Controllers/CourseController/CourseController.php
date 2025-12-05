<?php

namespace App\Http\Controllers\CourseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use Flasher\Laravel\Facade\Flasher;
class CourseController extends Controller
{
    
    public function detail($id)
    {
        $course = Course::findOrFail($id);
        return view('Student.detailcourse', compact('course'));
    }
    public function addcourse()
    {
        return view('Admin.addcourse');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'subjects' => 'required|min:1',
            'subjects.*' => 'required|string|max:255',
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'subjects' => json_encode($request->subjects),
        ]);
         flash()->option('position', 'top-right')->success('Course added successfully!') ;
        return redirect()->route('admin.viewcourse');
    }
    public function viewCourses()
    {
        $courses = Course::paginate(5);  
        return view('admin.viewcourse', compact('courses'));
    }
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.editcourse', compact('course'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'subjects' => 'required|min:1',
        ]);

        $course = Course::find($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->subjects = $request->subjects;
        $course->save();
        flash()
            ->option('position', 'top-right') 
            ->success('Course updated successfully!');
        return redirect()->route('admin.viewcourse');
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        flash()
        ->option('position', 'top-right') 
        ->success('Course deleted successfully!');
        return redirect()->route('admin.viewcourse');
    }
}
