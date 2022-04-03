<!doctype html>
<html class="antialiased" lang="ru">

<x-panels.head/>

<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">

@include('layouts.parts.header')

<main class="flex-1 container mx-auto bg-white">
@yield('content')
</main>

@include('layouts.parts.footer')
</div>
</body>
</html>
