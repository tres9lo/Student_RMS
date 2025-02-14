<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Support\Facades\DB; // For query building

class AttendanceReportController extends Controller
{
    public function index()
    {
        // Fetch all courses
        $courses = Course::all();
        return view('attendance.report.index', compact('courses'));
    }

    public function generateReport(Request $request)
    {
        // Validate the input
        $request->validate([
            'course_id' => 'required|exists:courses,CourseId',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Fetch attendance records with student information
        $attendanceRecords = DB::table('attendances')
        ->join('students', 'attendances.studentId', '=', 'students.StudentId') // Ensure proper join
        ->where('attendances.courseId', $request->course_id)
        ->whereBetween('attendances.attendanceDate', [$request->start_date, $request->end_date])
        ->select(
            'attendances.attendanceDate as attendance_date', // Alias to match view naming
            'students.FirstName as student_first_name',
            'students.LastName as student_last_name',
            'attendances.attendanceStatus as attendance_status'
        )
        ->orderBy('attendances.attendanceDate')
        ->get();
    

        // Fetch the course name for display purposes
        $course = Course::find($request->course_id);

        // Pass all data to the view
        return view('attendance.report.show', compact('attendanceRecords', 'course', 'request'));
    }
}
