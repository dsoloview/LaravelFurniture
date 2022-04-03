@extends('layouts.app')
@section('addHeadContent')
    <link href="/css/inner_page_template_styles.css" rel="stylesheet">
@endsection

@section('content')

        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('pageTitle')</h1>

            @yield('innerContent')

        </div>
@endsection
