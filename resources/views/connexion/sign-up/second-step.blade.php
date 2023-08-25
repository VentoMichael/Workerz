@extends('layouts.layout')
@section('title', 'Create Account - Account Information')
@section('description', 'Enter your account information to create your freelancer account on My Freelancer Website. Provide your name, email, password, and other details to get started.')
@section('keywords', 'freelancer, account, information, create account, name, email, password, details')


@section('content')
    <div class="relative bg-gray-800">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100"
                 alt="">
            <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Create Your
                Account</h1>
            <p class="mt-6 max-w-3xl text-xl text-gray-300"> Let's get started by creating your account. Please provide
                the following information to create your login credentials and keep track of your registration
                progress.</p>
        </div>
    </div>
    <div class="min-h-full flex max-w-screen-xl gap-12 m-4 sm:m-12 2xl:mx-auto">
        <div class=" md:block relative w-0 flex-1">
            <livewire:freelancer-form/>

        </div>

        <div class="hidden md:block relative w-0 flex-1 max-w-lg">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="sticky top-12" aria-label="Progress">
                <ol role="list" class="overflow-hidden">
                    <li class="relative pb-10">
                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-indigo-600"
                             aria-hidden="true"></div>
                        <!-- Complete Step -->
                        <div class="relative flex items-start group">
        <span class="h-9 flex items-center">
          <span
              class="relative z-10 w-8 h-8 flex items-center justify-center bg-indigo-600 rounded-full">
            <!-- Heroicon name: solid/check -->
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
        </span>
                            <span class="ml-4 min-w-0 flex flex-col">
          <span class="text-xs font-semibold tracking-wide uppercase">Choose Your Role</span>
          <span class="text-sm text-gray-500">Are you looking for freelancers or do you want to offer your services as a freelancer?</span>
        </span>
                        </div>
                    </li>

                    <li class="relative pb-10">
                        <!-- Current Step -->
                        <div class="relative flex items-start group" aria-current="step">
        <span class="h-9 flex items-center" aria-hidden="true">
          <span
              class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-indigo-600 rounded-full">
            <span class="h-2.5 w-2.5 bg-indigo-600 rounded-full"></span>
          </span>
        </span>
                            <span class="ml-4 min-w-0 flex flex-col">
          <span class="text-xs font-semibold tracking-wide uppercase text-indigo-600">Account Creation</span>
          <span class="text-sm text-gray-500">Fill in your information</span>
        </span>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>
    </div>

@endsection

