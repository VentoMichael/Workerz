@extends('layouts.layout')
@section('title', '')
@section('description', '')
@section('keywords', '')
@section('class-html', 'class="h-full bg-white"')


@section('content')

    <div class="min-h-full flex">
        <div class="flex-1 flex flex-col justify-center py-40 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Or
                        <x-nav-link kind="secondary" href="{{route('sign-up.role')}}">create an account</x-nav-link>
                    </p>
                </div>

                <livewire:authentication-form/>
            </div>
        </div>
        <div class="hidden md:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                 src="{{asset('img/pexels-fauxels-3184578.jpg')}}"
                 alt="">
        </div>
    </div>

@endsection
