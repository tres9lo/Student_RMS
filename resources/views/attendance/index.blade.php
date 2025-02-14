@extends('layouts.app')

@section('content')
    <div class="flex">
    <x-sidenav />

        {{-- Main Content --}}
        <div class="flex-1 p-6">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Page Title -->
            <h2 class="text-2xl font-semibold text-gray-600 mb-6">All Attendance Records</h2>
            
            <!-- Button Group -->
            <div class="mt-6 mb-3 flex space-x-4">
                <a href="{{ route('attendance.create') }}" class="inline-block bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                  <i class="bi bi-plus-circle"></i>  Create Attendance
                </a>
                <a href="{{ route('dashboard') }}" class="inline-block bg-gray-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 transition duration-300">
                    <i class="bi bi-arrow-left"></i> Return to Dashboard
                </a>
            </div>

            <!-- Attendance Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 font-medium text-gray-700">Student</th>
                            <th class="py-3 px-4 font-medium text-gray-700">Course</th>
                            <th class="py-3 px-4 font-medium text-gray-700">Attendance Date</th>
                            <th class="py-3 px-4 font-medium text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $attendance->student->FirstName }} {{ $attendance->student->LastName }}</td>
                                <td class="py-3 px-4">{{ $attendance->course->CourseName }}</td>
                                <td class="py-3 px-4">{{ \Carbon\Carbon::parse($attendance->AttendanceDate)->format('M d, Y') }}</td>
                                <td class="py-3 px-4">
                                    <span class="@class([
                                        'inline-block py-1 px-3 text-sm font-semibold rounded-full',
                                        'bg-green-100 text-green-600' => $attendance->AttendanceStatus == 'Present',
                                        'bg-red-100 text-red-600' => $attendance->AttendanceStatus == 'Absent',
                                        'bg-yellow-100 text-yellow-600' => $attendance->AttendanceStatus == 'Late',
                                    ])">
                                        {{ $attendance->AttendanceStatus }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
