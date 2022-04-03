@extends('layouts.inner')

@section('title', "Изменение новости")

@section('pageTitle', "Изменение новости")

@section('innerContent')

@if ($errors->any())
    <x-panels.form.error/>
@endif
@if( session()->has('success') )
    <x-panels.form.success/>
@endif
<form method="POST" action="{{route('articles.show', ['article' => $article])}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    @include('layouts.forms.form', ['article' => $article])
</form>

<form class="" action="{{route('articles.show', ['article' => $article])}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
        Удалить новость
    </button>
</form>


@endsection
