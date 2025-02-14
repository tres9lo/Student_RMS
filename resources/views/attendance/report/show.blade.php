@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-50">
        {{-- Sidebar --}}
        <x-sidenav class="w-1/4 min-w-[250px] bg-gray-800 text-white h-full" />

        {{-- Main content --}}
        <div class="flex-1 p-8 bg-white">
            <h2 class="text-2xl font-bold mb-4">Attendance Report for {{ $course->CourseName }}</h2>
            <p class="text-gray-700 mb-6">Date Range: {{ $request->start_date }} to {{ $request->end_date }}</p>

            @if ($attendanceRecords->isEmpty())
                <p class="text-red-500">No attendance records found for the selected date range.</p>
            @else
                <table class="w-full table-auto border-collapse bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="p-4 text-left text-sm font-semibold text-gray-600">Date</th>
                            <th class="p-4 text-left text-sm font-semibold text-gray-600">Student Name</th>
                            <th class="p-4 text-left text-sm font-semibold text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendanceRecords as $record)
                            <tr class="hover:bg-gray-100 border-b border-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $record->attendance_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $record->student_first_name }} {{ $record->student_last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if ($record->attendance_status === 'Present')
                                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Present</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Absent</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
