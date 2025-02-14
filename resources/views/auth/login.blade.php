@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8 space-y-6">


        <h2 class="text-3xl font-bold text-center text-gray-800">SRMS | Login</h2>

        @if(session('success'))
        <p class="text-center text-green-600 bg-green-100 py-2 px-4 rounded">{{ session('success') }}</p>
        @endif

        @if($errors->has('loginError'))
        <p class="text-center text-red-600 bg-red-100 py-2 px-4 rounded">{{ $errors->first('loginError') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm py-2 px-3"
                    placeholder="Enter your username">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm py-2 px-3"
                    placeholder="Enter your password">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember_me" class="font-medium text-gray-700">Remember me</label>
                    </div>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-gray-600 hover:text-gray-500">Forgot your password?</a>
                </div>
            </div>


            <div>
                <button type="submit"
                    class="w-full px-6 py-3 bg-gray-600 text-white font-medium rounded-lg shadow-lg hover:bg-igray-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    Login
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-500">
            Don't have an account? <a href="{{ route('register') }}"
                class="font-medium text-gray-600 hover:text-gray-500">Register</a>
        </div>
    </div>
</div>
@endsection