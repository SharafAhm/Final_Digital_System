@extends('layouts.app')

@section('content')
<x-auth-card>

    <h1 class="text-xl text-left font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Register
    </h1>
    <form class="space-y-4 md:space-y-6" action="{{ route('users.store') }}" method="POST">
        @csrf

        {{-- username --}}
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                First Name
            </label>
            <input type="username" name="username" id="username"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="First Name" required="" value="{{ old('username') }}">
            @error('username')
            <x-error-message :message="$message" />
            @enderror
        </div>

        {{-- name --}}
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Last Name
            </label>
            <input type="name" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Last name" required="" value="{{ old('name') }}">
            @error('name')
            <x-error-message :message="$message" />
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Email" required="" value="{{ old('email') }}">
            @error('email')
            <x-error-message :message="$message" />
            @enderror
        </div>

        <div>
            <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Mobile Number
            </label>
            <input type="number" name="number" id="number"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="number" required="" value="{{ old('number') }}">
            @error('number')
            <x-error-message :message="$message" />
            @enderror
        </div>

        {{-- age --}}
        <div>
            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Age
            </label>
            <input type="number" name="age" id="age"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="your age" required="" value="{{ old('age') }}">
            @error('age')
            <x-error-message :message="$message" />
            @enderror
        </div>

        {{-- password --}}
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required="">
            @error('password')
            <x-error-message :message="$message" />
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Confirm password
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required="">
        </div>

        <button type="submit"
            class="w-full text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-800 dark:hover:bg-blue-900 dark:focus:ring-blue-800">
            Sign up
        </button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account? <a href="{{ route('login') }}"
                class="font-medium text-blue-800 hover:underline dark:text-blue-800">Login here</a>
        </p>
    </form>

</x-auth-card>
@endsection