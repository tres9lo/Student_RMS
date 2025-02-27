<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // For date comparison

class AttendanceController extends Controller
{
    // Display all attendance records
    public function index()
    {
        $attendances = Attendance::with(['course', 'student'])->get();
        return view('attendance.index', compact('attendances'));
    }

    // Display the form to select a course to create attendance
    public function create()
    {
        $courses = Course::all();
        return view('attendance.create', compact('courses'));
    }

    // Show the list of students for the selected course to record attendance
    public function show(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,CourseId',
            'attendance_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    // Ensure date is exactly today
                    if (Carbon::parse($value)->format('Y-m-d') !== Carbon::now()->format('Y-m-d')) {
                        $fail('The ' . $attribute . ' must be today’s date.');
                    }
                },
            ],
        ]);

        $course = Course::find($request->course_id);

        if (!$course) {
            return redirect()->route('attendance.create')->withErrors('Course not found.');
        }

        $students = Student::all();

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
        'attendance_date' => [
            'required',
            'date',
            function ($attribute, $value, $fail) use ($request) {
                // Ensure date is exactly today
                if (Carbon::parse($value)->format('Y-m-d') !== Carbon::now()->format('Y-m-d')) {
                    $fail('The ' . $attribute . ' must be today’s date.');
                }

                // Check if attendance already exists for this course today
                $attendanceCount = Attendance::where('CourseId', $request->course_id)
                    ->whereDate('AttendanceDate', Carbon::today())
                    ->count();

                if ($attendanceCount >= 3) {
                    $fail('Attendance for this course has already been recorded 3 times today.');
                }
            },
        ],
    ]);

    // Store attendance
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
