@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-50">
        {{-- Sidebar --}}
        <x-sidenav class="w-1/4 min-w-[250px] bg-gray-800 shadow-sm border text-white h-full" />

        {{-- Main content --}}
        <div class="flex-1 p-8 bg-white">
            <h2 class="text-2xl text-gray-600 font-bold mb-4">Attendance Report</h2>
            
            <form action="{{ route('attendance.report.generate') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg border border-gray-200">
                @csrf

                {{-- Course Selection --}}
                <div class="mb-4">
                    <label for="course_id" class="block text-gray-700 font-medium">Select Course</label>
                    <select name="course_id" id="course_id" 
                        class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">-- Select Course --</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->CourseId }}">{{ $course->CourseName }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Start Date --}}
                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 font-medium">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                {{-- End Date --}}
                <div class="mb-4">
                    <label for="end_date" class="block text-gray-700 font-medium">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                        class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                {{-- Submit Button --}}
                <button type="submit" 
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                   <i class="bi bi-plus-circle"></i> Generate Report
                </button>
            </form>
        </div>
    </div>
@endsection
