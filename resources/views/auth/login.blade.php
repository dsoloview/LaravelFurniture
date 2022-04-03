@extends('layouts.inner_without_breadcrumbs')

@section('title', "Авторизация")

@section('pageTitle', "Авторизация")

@section('innerContent')

    @if ($errors->any())
        <x-panels.form.error/>
    @endif
    @if( session()->has('success') )
        <x-panels.form.success/>
    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mt-8 max-w-md">
                            <div class="grid grid-cols-1 gap-6">
                                <div class="block">
                                    <label for="email" class="text-gray-700 font-bold">Email</label>
                                    <input id="email" type="email" name="email" value="{{old('email')}}" class="mt-1 block w-full rounded-md {{ $errors->has('email') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" required autocomplete="email" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-xs italic text-red-600">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="block">
                                    <label for="password" class="text-gray-700 font-bold">Пароль</label>
                                    <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md {{ $errors->has('password') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                                    @if ($errors->has('password'))
                                        <span class="text-xs italic text-red-600">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="block">
                                    <div class="mt-2">
                                        <div>
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="ml-2">Запомнить меня</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="block">
                                    <button type="submit" class="inline-block bg-indigo-500 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        Авторизация
                                    </button>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        Забыли пароль?
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endsection
