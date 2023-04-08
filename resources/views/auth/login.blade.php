@extends('layouts.master')
@section('title', 'Register')
@section('content')
<div class="flexed-row-wrap">
    <div class="dash">
        <h2 class="headline-h2 uppercase" style="font-size: 21px;margin-bottom:1rem">{{Request::path()}}</h2>
        <section class="section">




            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <input type="text" value="{{old('email')}}" name="email" class="form-input" autocomplete="email" placeholder=" email">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />


                <!-- Password -->
                <div class="form-group">
                    <input type="text" name="password" class="form-input" autocomplete="new-password" placeholder="Password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />


                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection
