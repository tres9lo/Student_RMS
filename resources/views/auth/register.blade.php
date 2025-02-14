@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8 space-y-6">


        <h2 class="text-3xl font-bold text-center text-gray-800">SRMS | Register</h2>

        @if(session('success'))
        <p class="text-center text-green-600 bg-green-100 py-2 px-4 rounded">{{ session('success') }}</p>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-igray-500 focus:border-gray-500 sm:text-sm py-2 px-3"
                    placeholder="Enter your username">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm py-2 px-3"
                    placeholder="Enter your password">
            </div>

            <div>
                <button type="submit"
                    class="w-full px-6 py-3 bg-gray-600 text-white font-medium rounded-lg shadow-lg hover:bg-gray-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    Register
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-500">
            Already have an account? <a href="{{ route('login') }}"
                class="font-medium text-gray-600 hover:text-gray-500">Login</a>
        </div>
    </div>
</div>
@endsection