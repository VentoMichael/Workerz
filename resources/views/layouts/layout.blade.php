<!doctype html>
<html @yield('class-html') class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Workerz | Find and Hire Independent Workers</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Vento Michael">
    <meta name="language" content="French">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="copyright" content="{{env('APP_NAME')}}">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    @yield('head')
    @vite('resources/css/app.css')
    @livewireStyles

</head>
<body @yield('class-html')>

@include('layouts.header')
<main>
    @yield('content')
</main>
@include('layouts.footer')

@livewireScripts
@vite('resources/js/app.js')
@yield('scripts')
</body>
</html>
