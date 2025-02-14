@extends('layouts.app')

@section('content')

<div class="h-screen bg-cover bg-center flex flex-col" style="background-image: url('your-hero-image.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 py-12 flex-grow flex flex-col justify-center items-center text-center text-white"> {{-- Added flex-grow --}}

        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
            Welcome to Student RMS
        </h1>
        <p class="text-xl md:text-2xl mb-8">Manage Students and Records efficiently</p>

        <div class="flex flex-wrap justify-center space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition duration-300 transform hover:scale-105 focus:ring focus:ring-gray-400">
                <i class="bi bi-box-arrow-in-right mr-2"></i> Login
            </a>
            <a href="{{ route('register') }}" class="px-6 py-3 mt-4 md:mt-0 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition duration-300 transform hover:scale-105 focus:ring focus:ring-gray-400">
                <i class="bi bi-person-plus mr-2"></i> Register
            </a>
        </div>


        <div class="mt-8 grid grid-cols-2 gap-4"> {{-- Two-column grid for features --}}
            <div class="bg-white p-4 rounded-lg shadow-md text-gray-800">
                <i class="bi bi-people-fill text-gray-600 text-3xl mb-2"></i>
                <h3 class="text-lg font-semibold">Manage Students</h3>
                <p class="text-sm">Register, update, track.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md text-gray-800">
                <i class="bi bi-book-fill text-gray-600 text-3xl mb-2"></i>
                <h3 class="text-lg font-semibold">Manage Courses</h3>
                <p class="text-sm">Create, assign, organize.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md text-gray-800">
                <i class="bi bi-activity text-gray-600 text-3xl mb-2"></i>
                <h3 class="text-lg font-semibold">Recent Activity</h3>
                <p class="text-sm">Track your actions.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md text-gray-800">
                <i class="bi bi-bell-fill text-gray-600 text-3xl mb-2"></i>
                <h3 class="text-lg font-semibold">Notifications</h3>
                <p class="text-sm">Stay updated.</p>
            </div>
        </div>

    </div>

</div>

@endsection