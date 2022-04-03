@extends('layouts.inner_without_breadcrumbs')

@section('title', "Регистрация")

@section('pageTitle', "Регистрация")

@section('innerContent')

    @if ($errors->any())
        <x-panels.form.error/>
    @endif
    @if( session()->has('success') )
        <x-panels.form.success/>
    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mt-8 max-w-md">
                            <div class="grid grid-cols-1 gap-6">
                                <div class="block">
                                    <label for="name" class="text-gray-700 font-bold">ФИО</label>
                                    <input id="name" type="text" name="name" value="{{old('name')}}" class="mt-1 block w-full rounded-md {{ $errors->has('name') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" autocomplete="name">
                                    @if ($errors->has('name'))
                                        <span class="text-xs italic text-red-600">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="block">
                                    <label for="email" class="text-gray-700 font-bold">Email</label>
                                    <input id="email" type="email" name="email" value="{{old('email')}}" class="mt-1 block w-full rounded-md {{ $errors->has('email') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" autocomplete="email">
                                    @if ($errors->has('email'))
                                        <span class="text-xs italic text-red-600">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="block">
                                    <label for="password" class="text-gray-700 font-bold">Пароль</label>
                                    <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md {{ $errors->has('password') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" autocomplete="new-password">
                                    @if ($errors->has('password'))
                                        <span class="text-xs italic text-red-600">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="block">
                                    <label for="password-confirm" class="text-gray-700 font-bold">Пароль</label>
                                    <input id="password-confirm" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md {{ $errors->has('password') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" autocomplete="new-password">
                                    @if ($errors->has('password-confirm'))
                                        <span class="text-xs italic text-red-600">{{ $errors->first('password-confirm')}}</span>
                                    @endif
                                </div>
                                <div class="block">
                                    <button type="submit" class="inline-block bg-indigo-500 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        Регистрация
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
            @endsection
