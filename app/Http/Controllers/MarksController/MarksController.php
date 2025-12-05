<?php

namespace App\Http\Controllers\MarksController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\StudentResult;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\student_has_course;
use App\Mail\ResultGeneratedMail;
use App\Models\course;

class MarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:add marks')->only(['addmarks', 'store']);
        $this->middleware('permission:edit marks')->only(['editmarks', 'updatemarks']);
        $this->middleware('permission:delete marks')->only(['deletemarks']);
        $this->middleware('permission:view all results')->only(['viewresults']);
        $this->middleware('permission:view own result')->only(['detailresult']);
    }

    public function addmarks($id)
    {
        $user = User::with('student_has_courses.course')->findOrFail($id);
        $course = optional(optional($user->student_has_courses)->course);
        $subjects = json_decode($course->subjects ?? '[]', true);

        return view('admin.addmarks', compact('user', 'course', 'subjects'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'course_name' => 'required|string|max:255',
            'subjects' => 'required|array',
            'marks' => 'required|array',
            'total_marks' => 'required|numeric',
            'percentage' => 'required|numeric',
            'grade' => 'required|string',
            'result' => 'required|string'
        ]);

        $subjectMarks = [];
        foreach ($request->subjects as $index => $subject) {
            $subjectMarks[] = [
                'subject' => $subject,
                'marks' => $request->marks[$index]
            ];
        }
        $result = new StudentResult();
        $result->user_id = $request->user_id;
        $result->course_id = $request->course_id;
        $result->course_name = $request->course_name;
        $result->marks = json_encode($subjectMarks);
        $result->total_marks = $request->total_marks;
        $result->percentage = $request->percentage;
        $result->grade = $request->grade;
        $result->result = $request->result;
        $result->save();
        $user = User::find($request->user_id);
        Mail::to($user->email)->send(new ResultGeneratedMail($user));
        return redirect()->route('admin.viewresults')->with('success', 'Marks added successfully.');
    }
public function viewresults()
{
    $students = User::role('student')
        ->whereHas('student_has_courses')
        ->get();

    $results = StudentResult::all()->keyBy('user_id');

    return view('admin.viewresults', compact('students', 'results'));
}

    public function detailresult($id)
    {
    $results = StudentResult::with(['user', 'course'])
                ->where('user_id', $id)
                ->get();
    return view('admin.detailresult', compact('results'));
    }
    public function editmarks($id)
    {
        $studentResult = StudentResult::findOrFail($id);
        $user = User::findOrFail($studentResult->user_id);
        $course = optional($user->student_has_courses)->course;
        $marksData = json_decode($studentResult->marks, true); 
        return view('admin.editmarks', compact('studentResult', 'user', 'course', 'marksData'));
    }

    public function updatemarks(Request $request, $id)
    {
        $request->validate([
            'marks' => 'required|array',
            'total_marks' => 'required|numeric',
            'percentage' => 'required|numeric',
            'grade' => 'required|string',
            'result' => 'required|string'
        ]);
        $subjectMarks = [];
        foreach ($request->subjects as $index => $subject) {
            $subjectMarks[] = [
                'subject' => $subject,
                'marks' => $request->marks[$index]
            ];
        }
        $studentResult = StudentResult::findOrFail($id);
        $studentResult->marks = json_encode($subjectMarks);
        $studentResult->total_marks = $request->total_marks;
        $studentResult->percentage = $request->percentage;
        $studentResult->grade = $request->grade;
        $studentResult->result = $request->result;
        $studentResult->save();

        return redirect()->route('admin.viewresults')->with('success', 'Marks updated successfully.');  
    }

    public function deletemarks($id)
    {
        $studentResult = StudentResult::findOrFail($id);
        $studentResult->delete();
        return redirect()->route('admin.viewresults')->with('success', 'Marks deleted successfully.');
    }

    public function searchForms()
{
    $courses = Course::all();   // FIXED
    $captcha = strtoupper(Str::random(6));
    Session::put('captcha', $captcha);

    return view('admin.results', compact('captcha','courses'));
}


  public function showResults(Request $request)
{
    $request->validate([
        'enrollment_no' => 'required|string|min:10|max:10',
        'course_id' => 'required|exists:courses,id',
        'captcha' => 'required|string',
    ]);

    if (strtoupper($request->captcha) !== Session::get('captcha')) {
        return back()->withErrors(['captcha' => 'Captcha did not match.'])->withInput();
    }

    $user = User::where('enrollment_no', $request->enrollment_no)->first();

    if (!$user) {
        return back()->withErrors(['enrollment_no' => 'Student not found.'])->withInput();
    }

    $isAssigned = DB::table('student_has_courses')
        ->where('user_id', $user->id)
        ->where('course_id', $request->course_id)
        ->exists();

    if (!$isAssigned) {
        return back()->with('course_error', 'This course is not assigned to the given enrollment number.')->withInput();
    }

    $results = StudentResult::where('user_id', $user->id)
        ->where('course_id', $request->course_id)
        ->get();

    $captcha = strtoupper(Str::random(6));
    Session::put('captcha', $captcha);

    $courses = StudentResult::all()->unique('course_name');
    return view('admin.results', compact('results', 'user', 'captcha', 'courses'));
}


  public function searchForm()
    {
        $courses = StudentResult::all()->unique('course_name');
        $captcha = strtoupper(Str::random(6));
        Session::put('captcha', $captcha);
        return view('result', compact('captcha','courses'));
    }

  public function showResult(Request $request)
{
    $request->validate([
        'enrollment_no' => 'required|string|min:10|max:10',
        'course_id' => 'required|exists:courses,id',
        'captcha' => 'required|string',
    ]);

    if (strtoupper($request->captcha) !== Session::get('captcha')) {
        return back()->withErrors(['captcha' => 'Captcha did not match.'])->withInput();
    }

    $user = User::where('enrollment_no', $request->enrollment_no)->first();

    if (!$user) {
        return back()->withErrors(['enrollment_no' => 'Student not found.'])->withInput();
    }

    $isAssigned = DB::table('student_has_courses')
        ->where('user_id', $user->id)
        ->where('course_id', $request->course_id)
        ->exists();

    if (!$isAssigned) {
        return back()->with('course_error', 'This course is not assigned to the given enrollment number.')->withInput();
    }

    $results = StudentResult::where('user_id', $user->id)
        ->where('course_id', $request->course_id)
        ->get();

    $captcha = strtoupper(Str::random(6));
    Session::put('captcha', $captcha);

    $courses = StudentResult::all()->unique('course_name');
    return view('result', compact('results', 'user', 'captcha', 'courses'));
}
}