 @extends('layouts.layout')
@section('title', 'Create an Account - Step 1: Select Role')
@section('description', 'Create an account to access our platform and connect with freelancers or clients. Select your role - freelancer or client - to get started.')
@section('keywords', 'account creation, freelancer, client, platform')


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
    <div class="min-h-full flex max-w-screen-xl gap-12 m-4 sm:m-12 2xl:mx-auto">
        <div class="md:block relative w-0 flex-1">
            <form action="{{route('post.sign-up.role')}}" method="post">
                @csrf
                <fieldset class="mb-6">
                    <legend class="text-base font-medium text-gray-900">Select your role</legend>

                    <div class="mt-4 grid grid-cols-1 gap-y-6 lg:grid-cols-2 sm:gap-3">
                        @foreach($roles as $role)
                            <label class="input_radio relative bg-white border-gray-300 border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" name="role" value="{{ $role->id }}" class="sr-only" aria-labelledby="role-{{ $role->id }}-label" aria-describedby="role-{{ $role->id }}-description-{{ $role->id }}">
                                <div class="flex-1 flex">
                                    <div class="flex flex-col">
                                        <span id="role-{{ $role->id }}-label" class="block text-sm font-medium text-gray-900">{{ $role->title }}</span>
                                        <span id="role-{{ $role->id }}-description-{{ $role->id }}" class="mt-1 flex items-center text-sm text-gray-500">{{ $role->description }}</span>
                                    </div>
                                </div>
                                <svg class="invisible h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <div class="border_radio border-2 border-transparent  absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                            </label>

                        @endforeach
                        @error('role')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </fieldset>
                <div class="flex justify-end">
                    <x-button class="max-w-xs" kind="primary">Next step</x-button>
                </div>
            </form>


        </div>

        <div class="hidden md:block relative w-0 flex-1 max-w-lg">
            <nav aria-label="Progress" class="sticky top-8">
                <ol role="list" class="overflow-hidden">
                    <li class="relative pb-10">
                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"
                             aria-hidden="true"></div>
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

                </ol>
            </nav>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        const labels = document.querySelectorAll('label.input_radio');

        labels.forEach(label => {
            label.addEventListener('click', () => {
                labels.forEach(l => {
                    l.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500');
                    l.querySelector('svg').classList.add('invisible');
                    l.querySelector('.border_radio').classList.remove('border', 'border-indigo-500', 'border-transparent');
                    l.querySelector('.border_radio').classList.add('border-2');
                });

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
