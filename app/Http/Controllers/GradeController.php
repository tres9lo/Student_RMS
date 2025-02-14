<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;

class GradeController extends Controller
{
    // Show all grades
    public function index()
    {
        $grades = Grade::with(['student', 'course'])->get();
        return view('grades.index', compact('grades'));
    }

    // Show course selection form
    public function selectCourse()
    {
        $courses = Course::all();
        return view('grades.select_course', compact('courses'));
    }

    // Show assign grades form for the selected course
    public function assignGrades($courseId)
    {
        $course = Course::findOrFail($courseId);
        $students = Student::all();  // Adjust based on actual course-student relationships if needed
        return view('grades.assign_grades', compact('course', 'students'));
    }

    // Store the grades
    public function store(Request $request)
    {
        $request->validate([
            'CourseId' => 'required|exists:courses,CourseId',
            'StudentId' => 'required|array',
            'StudentId.*' => 'exists:students,StudentId',
            'Grade' => 'required|array',
            'Grade.*' => 'string|max:2',
        ]);

        foreach ($request->StudentId as $index => $studentId) {
            Grade::create([
                'StudentId' => $studentId,
                'CourseId' => $request->CourseId,
                'ExamDate' => now(),  // You can change this to accept an input
                'Grade' => $request->Grade[$index],
            ]);
        }

        return redirect()->route('grades.index')->with('success', 'Grades assigned successfully.');
    }

    // Delete a grade
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}

