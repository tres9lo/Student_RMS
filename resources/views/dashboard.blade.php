@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 flex">
<x-sidenav />

    {{-- Main Content --}}
    <div class="flex-grow p-6">
        <div class="flex items-center justify-between mb-8">
            <div>
            <h1 class="text-2xl font-bold text-gray-900">
    Hi, Welcome back <b class="text-gray-700">{{ $username }}</b>
</h1>

                <p class="text-gray-500">Student Record Management System</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition">
                    <i class="bi bi-box-arrow-right mr-2"></i> Logout
                </button>
            </form>
        </div>

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <div class="text-gray-600 text-3xl mb-2"><i class="bi bi-people-fill"></i></div>
                <h3 class="text-2xl font-semibold">{{ $studentCount }}</h3>
                <p class="text-gray-600">Students</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <div class="text-gray-600 text-3xl mb-2"><i class="bi bi-book-fill"></i></div>
                <h3 class="text-2xl font-semibold">{{ $courseCount }}</h3>
                <p class="text-gray-600">Courses</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <div class="text-gray-600 text-3xl mb-2"><i class="bi bi-person-check-fill"></i></div>
                <h3 class="text-2xl font-semibold">{{ $attendanceCount }}</h3>
                <p class="text-gray-600">Attendance Records</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <div class="text-gray-600 text-3xl mb-2"><i class="bi bi-pencil"></i></div>
                <h3 class="text-2xl font-semibold">{{ $gradeCount }}</h3>
                <p class="text-gray-600">Grades</p>
            </div>
        </div>

        {{-- Users and Notifications --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="flex justify-center items-center text-lg font-semibold text-gray-900 mb-4">Users</h2>
                <div id="enrollmentChart" class="h-64">
                <ul class="overflow-y-auto h-full px-4 py-2 space-y-3">
        @foreach ($users as $user)
            <li class="py-3 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 transition duration-300 flex items-center">
                <div class="flex-grow">
                    {{ $user->username }}
                </div>
                <div>  {{-- Bootstrap Icon --}}
                    <i class="bi bi-chevron-right text-gray-500"></i>  {{-- Example chevron right icon --}}
                </div>
            </li>
        @endforeach
        @if ($users->isEmpty())
            <li class="py-3 px-4 text-center text-gray-500">No users registered yet.</li>
        @endif
    </ul>


                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Notifications</h2>
                <ul class="space-y-4">
                    <li class="py-2 border-b border-gray-200">Students enrolled: {{ $studentCount }}</li>
                    <li class="py-2 border-b border-gray-200">Courses : {{ $courseCount }}</li>
                    <li class="py-2 border-b border-gray-200">Attendance marked for: {{ $attendanceCount }} students</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
