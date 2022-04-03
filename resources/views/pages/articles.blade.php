@extends('layouts.inner')

@section('title', 'Рога и Сила - Все новости')

@section('pageTitle', 'Все новости')

@admin(Auth::user())
@section('extraContent')
        <a href="{{route('articles.create')}}" class="text-center bg-indigo-500 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
            Создать новость
        </a>
@endsection
@endadmin

@section('innerContent')

<div class="space-y-4">
<x-panels.articles.menuArticle :articles="$articles"/>
</div>

{{$articles->links()}}

@endsection
