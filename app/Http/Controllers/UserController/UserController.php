<?php

namespace App\Http\Controllers\UserController;
use App\Models\StudentResult;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student_has_course;
use App\Models\course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Admin|teacher');
        $this->middleware('permission:view teacher|view student', ['only' => ['index', 'viewUsers']]);
        $this->middleware('permission:add teacher|add student', ['only' => ['create', 'store', 'adduser']]);
        $this->middleware('permission:edit teacher|delete teacher', ['only' => ['edituser', 'updateuser', 'deleteuser']]);
        $this->middleware('permission:edit student|delete student', ['only' => ['edituser', 'updateuser', 'deleteuser']]);
        $this->middleware('permission:delete teacher', ['only' => ['deleteuser']]);
        $this->middleware('permission:delete student', ['only' => ['deleteStudent']]);
        $this->middleware('permission:view role', ['only' => ['viewRoles']]);
        $this->middleware('permission: view Profile', ['only' => ['viewProfile']]);
        $this->middleware('permission: edit Profile', ['only' => ['editProfile', 'updateProfile']]);

        //course
        $this->middleware('permission: view course', ['only' => ['viewCourses']]);
        $this->middleware('permission:add course', ['only' => ['addcourse', 'store']]);
        $this->middleware('permission:edit course', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete course', ['only' => ['destroy']]);

        //subject
        $this->middleware('permission:view subject', ['only' => ['viewsubject']]);
        $this->middleware('permission:add subject', ['only' => ['addsubject', 'store']]);
        $this->middleware('permission:edit subject', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete subject', ['only' => ['destroy']]);
        
    }

    public function viewUsers()
    {
        $currentUser = auth()->user();
        if ($currentUser->hasRole('teacher')) 
        {
            $users = User::whereHas('roles', function ($query) {
                    $query->where('name', 'student');
                })->where('created_by', $currentUser->id)->with('roles')->paginate(5);
             $studentResultUserIds = StudentResult::pluck('user_id')->toArray();
        } else 
        {
            $users = User::with('roles')->paginate(5);
            $studentResultUserIds = StudentResult::pluck('user_id')->toArray();
        }
        return view('admin.viewuser', compact('users','studentResultUserIds'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('teacher'))
        {
            $roles = Role::where('name', 'student')->get();
        } else {
            $roles = Role::all();
        }
        return view('admin.adduser', compact('roles'));
    }



    public function adduser(Request $request)
    {
            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
            'enrollment_no' => 'nullable|unique:users,enrollment_no', // Add this
        ]);

         $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->created_by = $request->created_by;
        if ($request->role === 'Student') {
            $user->enrollment_no = $request->enrollment_no;
        }

        $user->save();
        $user->assignRole($request->role);
        Mail::to($user->email)->send(new UserRegisteredMail($user));
        flash()->option('position', 'top-right')->success('User added successfully with role');
        return redirect()->route('admin.viewuser');
    }
        public function edit($id)
        {
            $student_has_course = student_has_course::where('user_id', $id)->first();
            $courses = Course::all();
            $user = User::find($id);
            $roles = Role::all();
            return view('admin.edituser', compact('user', 'roles','courses','student_has_course'));
        }
     public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required|exists:roles,name',
        'enrollment_no' => 'nullable|string',
    ]);

    $user = User::find($id);

    
    if ($request->role === 'Student') 
    {
        $request->validate([
            'course_id' => 'required',
            'course_name' => 'required',
            'enrollment_no' => 'required|string|min:5'
        ]);

        
        $studentRecord = student_has_course::where('user_id', $id)->first();

        if (!$studentRecord) {
          
            student_has_course::create([
                'user_id' => $id,
                'course_id' => $request->course_id,
                'course_name' => $request->course_name
            ]);
        } else {
            
            $studentRecord->update([
                'course_id' => $request->course_id,
                'course_name' => $request->course_name
            ]);
        }

       
        $user->enrollment_no = $request->enrollment_no;
    }
    else 
    {
        
        student_has_course::where('user_id', $id)->delete();

     
        $user->enrollment_no = null;
    }

    
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }
    $user->save();

    
    $user->syncRoles([$request->role]);

    flash()->option('position', 'top-right')->success('User updated successfully with role');
    return redirect()->route('admin.viewuser');
}

    
        public function destroy($id)
        {
            $user = User::find($id);
            $user->delete();
            flash()->option('position', 'top-right')->success('User deleted successfully');
            return redirect()->route('admin.viewuser');

        }
}
