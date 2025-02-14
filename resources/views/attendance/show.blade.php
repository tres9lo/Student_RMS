@extends('layouts.app')

@section('content')
    <div class="flex">
        {{-- Sidebar --}}
        <div class="w-64 bg-white shadow-lg p-6 h-screen hidden md:flex flex-col">
            <div class="flex items-center justify-center mb-8">
                <span class="text-2xl font-bold text-green-600">Students_RMS</span>
            </div>
            <nav class="flex flex-col space-y-6">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-green-600 hover:text-green-800">
                    <i class="bi bi-grid text-lg"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('students.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-green-800">
                    <i class="bi bi-people-fill"></i>
                    <span>Students</span>
                </a>
                <a href="{{ route('courses.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-green-800">
                    <i class="bi bi-book-fill"></i>
                    <span>Courses</span>
                </a>
                <a href="{{ route('attendance.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-green-800">
                    <i class="bi bi-person-check-fill"></i>
                    <span>Attendance</span>
                </a>
                <a href="{{ route('grades.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-green-800">
                    <i class="bi bi-pencil"></i>
                    <span>Grades</span>
                </a>
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="flex-1 p-6">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Page Title -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Mark Attendance for Course: <span class="text-blue-600">{{ $course->CourseName }}</span> on <span class="text-blue-600">{{ \Carbon\Carbon::parse($attendanceDate)->format('M d, Y') }}</span>
            </h2>

            <!-- Return to Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="inline-block bg-gray-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 mb-6">
                Return to Dashboard
            </a>

            <!-- Check if there are no students -->
            @if($students->isEmpty())
                <p class="text-red-500 font-semibold">No students available in the system for this course.</p>
            @else
                <form action="{{ route('attendance.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->CourseId }}">
                    <input type="hidden" name="attendance_date" value="{{ $attendanceDate }}">

                    @foreach ($students as $student)
                        <div class="mb-4 flex items-center justify-between">
                            <label for="status_{{ $student->StudentId }}" class="block text-sm font-medium text-gray-700 w-1/2">
                                {{ $student->FirstName }} {{ $student->LastName }}
                            </label>
                            <div class="w-1/2">
                                <select name="attendance[{{ $student->StudentId }}][status]" class="form-select mt-2 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Late">Late</option>
                                </select>
                                <input type="hidden" name="attendance[{{ $student->StudentId }}][student_id]" value="{{ $student->StudentId }}">
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="inline-block bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        Submit Attendance
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection
