<?php
use App\Http\Controllers\DashboardController\DashboardController;
use App\Http\Controllers\MarksController\MarksController;

use App\Http\Controllers\UserController\UserController;
use App\Http\Controllers\Role\RoleController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController\CourseController;
use App\Http\Controllers\SubjectController\SubjectController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); 
})->middleware('auth')->name('admin.dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


//add role
Route::prefix('/admin')->name('admin.')->group(function () {
Route::middleware(['auth', 'role:Super Admin'])->group(function () {
Route::get('/addrole', [RoleController::class, 'create'])->name('addrole');
Route::post('/addrole', [RoleController::class, 'store'])->name('addrole');
Route::get('/viewrole', [RoleController::class, 'index'])->name('viewrole');
Route::get('/editrole/{id}', [RoleController::class, 'edit'])->name('editrole');
Route::put('/editrole/{id}', [RoleController::class, 'update'])->name('editrole');
Route::DELETE('/deleterole/{id}', [RoleController::class, 'destroy'])->name('deleterole');
});

//course
Route::middleware(['auth', 'role:Super Admin|teacher|Student'])->group(function () {
   Route::get('/addcourse', [CourseController::class, 'addcourse'])->name('addcourse')->middleware('permission:add course');
    Route::post('/admin/addcourse', [CourseController::class, 'store'])->name('storecourse')->middleware('permission:add course');
    Route::get('/viewcourses', [CourseController::class, 'viewCourses'])->name('viewcourse')->middleware('permission:view course');
    Route::get('/editcourse/{id}', [CourseController::class, 'edit'])->name('editcourse')->middleware('permission:edit course');
    Route::put('/editcourse/{id}', [CourseController::class, 'update'])->name('editcourse')->middleware('permission:edit course');
    Route::delete('/deletecourse/{id}', [CourseController::class, 'destroy'])->name('deletecourse')->middleware('permission:delete course');
});


//result 
Route::middleware(['auth', 'role:Super Admin|teacher|Student'])->group(function () {
Route::get('/addmarks/{id}', [MarksController::class, 'addmarks'])->middleware('permission:add marks')->name('addmarks');
Route::post('/addmarks/{id}', [MarksController::class, 'store'])->middleware('permission:add marks')->name('storemarks');
Route::get('/viewresults', [MarksController::class, 'viewresults'])->middleware('permission:view all results')->name('viewresults');
Route::get('/detailresult/{id}', [MarksController::class, 'detailresult'])->middleware('permission:view own result')->name('detailresult');
Route::get('/editmarks/{id}', [MarksController::class, 'editmarks'])->middleware('permission:edit marks')->name('editmarks');
Route::put('/editmarks/{id}', [MarksController::class, 'updatemarks'])->middleware('permission:edit marks')->name('updatemarks');
Route::delete('/deletemarks/{id}', [MarksController::class, 'deletemarks'])->middleware('permission:delete marks')->name('deletemarks');
});


//user
Route::middleware(['auth', 'role:Super Admin|teacher'])->group(function () {
    Route::get('/adduser', [UserController::class, 'create'])->name('adduser');
    Route::post('/adduser', [UserController::class, 'adduser'])->name('storeuser');
    Route::get('/viewuser', [UserController::class, 'viewUsers'])->name('viewuser');
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::put('/edituser/{id}', [UserController::class, 'update'])->name('edituser');
    Route::delete('/deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');
});

Route::get('/results', [MarksController::class, 'searchForms'])->name('resultForms');
Route::post('/results', [MarksController::class, 'showResults'])->name('results');

});

Route::get('/reload-captcha', function () {
    function generateMixedCaptcha($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        return substr(str_shuffle(str_repeat($characters, $length)), 0, $length);
    }
    $captcha = generateMixedCaptcha();
    Session::put('captcha', $captcha);

    return response()->json(['captcha' => $captcha]);
});

//student
Route::get('/result', [MarksController::class, 'searchForm'])->name('resultForm');
Route::post('/result', [MarksController::class, 'showResult'])->name('result');
//student profile
Route::get('/Student/profilestudent', function () {
    return view('Student.profilestudent');
    })->name('Student.profilestudent');
    
//student details of course
 Route::get('/Student/detailcourse/{id}', [CourseController::class, 'detail'])->name('Student.detailcourse');
//student subject details
Route::get('/Student/subjectdetails/{id}', [SubjectController::class, 'subjectdetails'])->name('Student.Subjectdetails');
//student profile view
Route::get('/Student/profilestudent/{id}', [AdminController::class, 'profilestudent'])->name('Student.profilestudent');
//edit profile 
Route::get('/Student/editprofile/{id}', [AdminController::class, 'editprofile'])->name('Student.editprofile');
//student profile update
Route::put('/Student/editprofile/{id}', [AdminController::class, 'updateprofile'])->name('Student.editprofile');

//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    $user = (object)[
        'name' => 'Test User',
        'email' => 'test@example.com'
    ];
    Mail::to('your_email@example.com')->send(new UserRegisteredMail($user));
    return 'Test mail sent!';
});