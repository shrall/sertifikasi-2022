@extends('layouts.app')

@section('content')
    <div class="min-h-full flex flex-col justify-center py-2 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign up for a new account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" autocomplete="name" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-500 text-md">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700"> Address </label>
                        <div class="mt-1">
                            <textarea id="address" name="address" type="text" autocomplete="address" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-500 text-md">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-500 text-md">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>


                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Password
                            Confirmation </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                autocomplete="current-password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        <div class="text-sm">Already have an account yet?</div>
                        <div class="text-sm">
                            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Login </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
                            up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
