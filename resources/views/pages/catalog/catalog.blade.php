@extends('layouts.inner_without_sidebar')

@section('title', $category->name ?? 'Каталог')
@section('pageTitle', $category->name ?? 'Каталог')


@section('innerContent')
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
                @foreach ($furniture_items as $furniture)
                    <x-panels.furniture.furniture :furniture="$furniture"/>
                @endforeach
             </div>

             {{-- Пагинация --}}
             {{$furniture_items->links()}}

@endsection
