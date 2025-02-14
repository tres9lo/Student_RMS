<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Display all attendance records
    public function index()
    {
        // Get all attendance records with course and student details
        $attendances = Attendance::with(['course', 'student'])->get();
        return view('attendance.index', compact('attendances'));
    }

    // Display the form to select a course to create attendance
    public function create()
    {
        $courses = Course::all(); // Get all courses
        return view('attendance.create', compact('courses'));
    }

    // Show the list of students for the selected course to record attendance
    public function show(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'course_id' => 'required|exists:courses,CourseId',
            'attendance_date' => 'required|date',
        ]);
    
        // Fetch the course using the ID provided in the request
        $course = Course::find($request->course_id);
    
        // If course not found, redirect with an error
        if (!$course) {
            return redirect()->route('attendance.create')->withErrors('Course not found.');
        }
    
        // Fetch all students from the system, not just the ones enrolled in the course
        $students = Student::all();  // This will get all students registered in the system
    
        // Pass the course, students, and attendance date to the view
        return view('attendance.show', [
            'students' => $students,
            'course' => $course,
            'attendanceDate' => $request->attendance_date
        ]);
    }
    
    

    // Store the attendance records for the selected course
    public function store(Request $request)
    {
        $request->validate([
            'attendance' => 'required|array',
            'attendance.*.student_id' => 'required|exists:students,StudentId',
            'attendance.*.status' => 'required|in:Present,Absent,Late',
        ]);

        foreach ($request->attendance as $attendanceData) {
            Attendance::create([
                'StudentId' => $attendanceData['student_id'],
                'CourseId' => $request->course_id,
                'AttendanceDate' => $request->attendance_date,
                'AttendanceStatus' => $attendanceData['status'],
            ]);
        }

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully!');
    }
}

