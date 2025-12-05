<?php

namespace App\Http\Controllers\DashboardController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;   
use App\Models\Course; 

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = User::role('Student')->count();
        $teacherCount = User::role('Teacher')->count();
        $courseCount = Course::count();
        return view('admin.dashboard', compact('studentCount', 'teacherCount', 'courseCount'));
    }
}
