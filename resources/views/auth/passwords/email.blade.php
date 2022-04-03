@extends('layouts.inner_without_breadcrumbs')

@section('title', "Восстановление пароля")

@section('pageTitle', "Восстановление пароля")

@section('innerContent')

    @if ($errors->any())
        <x-panels.form.error/>
    @endif
    @if( session()->has('success') )
        <x-panels.form.success/>
    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                                    <button type="submit" class="inline-block bg-indigo-500 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        Отправить ссылку для восстановления пароля
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endsection
