@extends('layouts.app')
@section('addHeadContent')
    <link href="/css/inner_page_template_styles.css" rel="stylesheet">
@endsection
@section('content')
    {{ Breadcrumbs::render() }}

    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <x-panels.inner.aside/>

        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">

            <div class="flex align-items-center" style='justify-content: space-between; align-items:center;'>
                <h1 class="text-black text-3xl font-bold mb-4">@yield('pageTitle')</h1>
                @yield('extraContent')
            </div>

            <div class="space-y-4">
            @yield('innerContent')
            </div>
        </div>
    </div>

@endsection
