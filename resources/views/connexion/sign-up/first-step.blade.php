@extends('layouts.layout')
@section('title', '')
@section('description', '')
@section('keywords', '')


@section('content')
    <div class="relative bg-gray-800">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100"
                 alt="">
            <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Let's get started!</h1>
            <p class="mt-6 max-w-3xl text-xl text-gray-300">Welcome to our registration process. We're excited to have you on board. In this first step, please select your role by choosing either "I am a freelancer" or "I want freelancer services". Let's get started on building your next project together!</p>
        </div>
    </div>
    <div class="min-h-full flex mx-auto max-w-screen-xl gap-12 my-12">
        <div class=" md:block relative w-0 flex-1">
            <form action="{{route('sign-up.account')}}">
                <fieldset class="mb-6">
                    <legend class="text-base font-medium text-gray-900">Select your role</legend>

                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <!--
                          Checked: "border-transparent", Not Checked: "border-gray-300"
                          Active: "border-indigo-500 ring-2 ring-indigo-500"
                        -->
                        <label class="input_radio relative bg-white border-gray-300 border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="project-type" value="Newsletter" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                            <div class="flex-1 flex">
                                <div class="flex flex-col">
                                    <span id="project-type-0-label" class="block text-sm font-medium text-gray-900"> I am a freelancer </span>
                                    <span id="project-type-0-description-0" class="mt-1 flex items-center text-sm text-gray-500"> If you are an independent professional or self-employed individual offering your services to others, select this option. </span>
                                </div>
                            </div>
                            <!--
                              Not Checked: "invisible"

                              Heroicon name: solid/check-circle
                            -->
                            <svg class="invisible h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                            <div class="border_radio border-2 border-transparent  absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                        </label>

                        <!--
                          Checked: "border-transparent", Not Checked: "border-gray-300"
                          Active: "border-indigo-500 ring-2 ring-indigo-500"
                        -->
                        <label class="input_radio relative bg-white border-gray-300 border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="project-type" value="Existing Customers" class="sr-only" aria-labelledby="project-type-1-label" aria-describedby="project-type-1-description-0 project-type-1-description-1">
                            <div class="flex-1 flex">
                                <div class="flex flex-col">
                                    <span id="project-type-1-label" class="block text-sm font-medium text-gray-900"> I want freelancers services</span>
                                    <span id="project-type-1-description-0" class="mt-1 flex items-center text-sm text-gray-500"> If you need help with a project or task and want to hire an independent professional or self-employed individual to assist you, select this option. </span>
                                </div>
                            </div>
                            <!--
                              Not Checked: "invisible"

                              Heroicon name: solid/check-circle
                            -->
                            <svg class="invisible h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                            <div class="border_radio border-2 border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                        </label>
                    </div>
                </fieldset>
                <div class="flex justify-end ">
                    <x-button class="max-w-xs" kind="primary">Next step</x-button>
                </div>
            </form>


        </div>

        <div class="block relative w-0 flex-1 max-w-lg">
            <nav aria-label="Progress" class="sticky top-8">
                <ol role="list" class="overflow-hidden">
                    <li class="relative pb-10">
                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"
                             aria-hidden="true"></div>
                        <!-- Complete Step -->
                        <div class="relative flex items-start group">
        <span class="h-9 flex items-center" aria-hidden="true">
          <span
              class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-indigo-600 rounded-full">
            <span class="h-2.5 w-2.5 bg-indigo-600 rounded-full"></span>
          </span>
        </span>
                            <span class="ml-4 min-w-0 flex flex-col">
          <span class="text-xs font-semibold tracking-wide uppercase text-indigo-600">Choose Your Role</span>
          <span class="text-sm text-gray-500">Are you looking for freelancers or do you want to offer your services as a freelancer?</span>
        </span>
                        </div>
                    </li>

                    <li class="relative pb-10">
                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"
                             aria-hidden="true"></div>
                        <!-- Current Step -->
                        <div class="relative flex items-start group" aria-current="step">
        <span class="h-9 flex items-center" aria-hidden="true">
          <span
              class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full">
            <span class="h-2.5 w-2.5 bg-transparent rounded-full"></span>
          </span>
        </span>
                            <span class="ml-4 min-w-0 flex flex-col">
          <span class="text-xs font-semibold tracking-wide uppercase text-gray-500">Account Creation</span>
          <span class="text-sm text-gray-500">Fill in your information</span>
        </span>
                        </div>
                    </li>

                    <li class="relative">
                        <!-- Upcoming Step -->
                        <div class="relative flex items-start group">
        <span class="h-9 flex items-center" aria-hidden="true">
          <span
              class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full">
            <span class="h-2.5 w-2.5 bg-transparent rounded-full"></span>
          </span>
        </span>
                            <span class="ml-4 min-w-0 flex flex-col">
          <span class="text-xs font-semibold tracking-wide uppercase text-gray-500">Confirm Your Request</span>
          <span class="text-sm text-gray-500">Confirm your account details</span>
        </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        // Get all label elements
        const labels = document.querySelectorAll('label.input_radio');

        // Add click event listener to each label
        labels.forEach(label => {
            label.addEventListener('click', () => {
                // Remove "border-indigo-500 ring-2 ring-indigo-500" class from all labels
                labels.forEach(l => {
                    l.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500');
                    l.querySelector('svg').classList.add('invisible');
                    l.querySelector('.border_radio').classList.remove('border', 'border-indigo-500', 'border-transparent');
                    l.querySelector('.border_radio').classList.add('border-2');
                });

                // Add "border-indigo-500 ring-2 ring-indigo-500" class to clicked label
                label.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500');
                label.querySelector('svg').classList.remove('invisible');
                label.querySelector('.border_radio').classList.add('border');
                label.querySelector('.border_radio').classList.remove('border-2', 'border-transparent');
                const checkedBorderRadio = label.querySelector('input:checked ~ .border_radio');
                if (checkedBorderRadio !== null) {
                    checkedBorderRadio.classList.add('border-indigo-500');
                    checkedBorderRadio.classList.remove('border-transparent');
                }
            });
        });



    </script>
    @endsection
