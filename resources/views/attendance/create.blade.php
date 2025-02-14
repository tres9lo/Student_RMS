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
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Select Course to Create Attendance</h2>

            <!-- Return to Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="inline-block bg-gray-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 mb-6">
                Return to Dashboard
            </a>

            <!-- Attendance Form -->
            <form action="{{ route('attendance.show') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div class="mb-4">
                    <label for="course_id" class="block text-sm font-medium text-gray-700">Select Course</label>
                    <select name="course_id" class="form-select mt-2 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                        <option value="">Select a Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->CourseId }}">{{ $course->CourseName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="attendance_date" class="block text-sm font-medium text-gray-700">Attendance Date</label>
                    <input type="date" name="attendance_date" class="form-input mt-2 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                </div>

                <button type="submit" class="inline-block bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Proceed to Mark Attendance
                </button>
            </form>
        </div>
    </div>
@endsection
