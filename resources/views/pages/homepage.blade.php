@extends('layouts.app')
@section('addHeadContent')
    <link href="/css/main_page_template_styles.css" rel="stylesheet">
@endsection
@section('content')
    @if(!$banners->isEmpty())
        <x-panels.homepage.slider :banners="$banners" />
        @endif
        @if (!$newFurniture->isEmpty())
            <x-panels.homepage.weekModel :newFurniture="$newFurniture"/>
        @endif

        <x-panels.homepage.homeNews :articles="$articles"/>
@endsection
