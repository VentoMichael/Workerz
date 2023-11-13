@extends('layouts.layout')
@section('title', 'Page Not Found - Error 404')
@section('description', 'Sorry, the page you are looking for cannot be found. Please check the URL or use the search bar to find what you are looking for.')
@section('keywords', 'error 404, page not found, missing page, broken link, website error, 404 error page')
@section('class-html', 'class="h-full"')

@section('content')
<main class="min-h-full bg-cover bg-top sm:bg-top" style="background-image: url('https://images.unsplash.com/photo-1545972154-9bb223aac798?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=3050&q=80&exp=8&con=-15&sat=-75')">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 text-white">404</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Something's missing.</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that page. You'll find lots to explore on the home page. </p>
                <a href="{{ route('home.index') }}"><x-button kind="primary">Back to Homepage</x-button></a>
            </div>
        </div>
    </section>
</main>
@endsection
