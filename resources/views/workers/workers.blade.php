@extends('layouts.layout')
@section('title', 'Browse Talented Freelancers')
@section('description', 'Discover talented freelancers on our platform. Browse through their skills, portfolio, and reviews from other clients. Hire the right person for your project today.')
@section('keywords', ' freelancers, skills, portfolio, reviews, hire')

@section('content')

    <section>
        <h1 class="sr-only">
            Workers page
        </h1>
        <livewire:preview-list-workers />
@endsection
@section('scripts')


    <script>
        function copyUrl(url) {
            const input = document.createElement('input');
            input.value = url;
            document.body.appendChild(input);

            input.select();
            document.execCommand('copy');

            document.body.removeChild(input);
        }
    </script>

@endsection
