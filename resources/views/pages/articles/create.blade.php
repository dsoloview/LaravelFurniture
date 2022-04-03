@extends('layouts.inner')

@section('title', "Создание новости")

@section('pageTitle', "Создание новости")

@section('innerContent')

@if ($errors->any())
    <x-panels.form.error/>
@endif
@if( session()->has('success') )
    <x-panels.form.success/>
@endif
<form method="POST" action="{{route('articles.index')}}" enctype="multipart/form-data">
    @csrf
    @include('layouts.forms.form', ['article' => new App\Models\Article])
</form>
@endsection
