<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use App\Models\Student;
use App\Models\Course;
use App\Models\Attendance;
use App\Models\Grade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ensure user is authenticated before accessing the dashboard
        $username = auth()->check() ? auth()->user()->username : 'Guest';  // Ensure lowercase property

        // Fetch counts for dashboard statistics
        $studentCount = Student::count();
        $courseCount = Course::count();
        $attendanceCount = Attendance::count();
        $gradeCount = Grade::count();

        // Fetch all users
        $users = User::all();

        // Pass all data to the view
        return view('dashboard', compact(
            'studentCount',
            'courseCount',
            'attendanceCount',
            'gradeCount',
            'users',
            'username'
        ));
    }
}
