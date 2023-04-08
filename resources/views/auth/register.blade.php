@extends('layouts.master')
@section('title', 'Register')
@section('content')
<div class="flexed-row-wrap">
    <div class="dash">
        <h2 class="headline-h2 uppercase" style="font-size: 21px;margin-bottom:1rem">{{Request::path()}}</h2>
        <section class="section">
            <form method="POST" class="wtd-form" action="{{ route('register') }}">

                @csrf
                <!-- Name -->
                <div class="form-group">
                    <input type="text" value="{{old('name')}}" name="name" class="form-input" autofocus autocomplete="name" placeholder="Full name">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

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

                <!-- Confirm Password -->
                <div class="form-group">
                    <input type="text" name="password_confirmation" class="form-input" autocomplete="new-password" placeholder="Password Confirmation">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!-- Referral Id -->
                <div class="form-group">
                    <input type="text" class="form-input" name="referee" placeholder="Referee Id" @if (Request::query('ref')) readonly @endif value="{{old('referee') ?? Request::query('ref')}}">
                </div>
                <x-input-error :messages="$errors->get('referee')" class="mt-2" />

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection
