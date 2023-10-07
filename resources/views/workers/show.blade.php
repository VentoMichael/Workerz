@extends('layouts.layout')
@section('title', 'Hire [worker name] - Freelancer Profile')
@section('description', 'Find the perfect freelancer for your project. Discover the skills, portfolio, and experience of [worker name] on our platform. Contact [worker name] now to start your collaboration.')
@section('keywords', 'freelancer, [worker name], portfolio, skills, experience, collaboration')
@section('class-html', 'class="h-full bg-gray-100"')

@section('head')
    @vite('resources/css/swiper.css')
@endsection
@section('content')
    <div class="min-h-full">
        <!-- Page header -->
        <div>
            <div>
                <img class="h-32 w-full object-cover lg:h-48"
                     srcset="
                                     @if (is_array($worker->company->backgroundUpload))
                     @foreach($worker->company->backgroundUpload as $imagePath)
                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                     @endif
                         "
                     src="{{ asset('storage/' . (is_array($worker->company->backgroundUpload) ? $worker->company->backgroundUpload[0] : $worker->company->backgroundUpload)) }}"
                     alt="Logo of {{ $worker->company->name }}"/>
            </div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        @if (is_string($worker->company->logoUpload) && strpos($worker->company->logoUpload, 'initials') !== false)
                            <img
                                class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                src="{{ asset('storage/' . $worker->company->logoUpload . '.svg') }}"
                                alt="Logo of {{ $worker->company->name }}"/>
                        @else
                            <img
                                class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                srcset="
            @if (is_array($worker->company->logoUpload))
                                @foreach($worker->company->logoUpload as $imagePath)
                                {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                @endif
                                    "
                                src="{{ asset('storage/' . (is_array($worker->company->logoUpload) ? $worker->company->logoUpload[0] : $worker->company->logoUpload)) }}"
                                alt="Logo of {{ $worker->company->name }}"/>
                        @endif
                    </div>

                    <div class="mt-4 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                        <div class="sm:hidden md:block min-w-0 flex-1">
                            <div class="flex gap-4 items-center">
                                <h1 class="text-2xl font-bold text-gray-900 truncate">{{ $worker->company->name }}</h1></div>
                        </div>

                        <div class="flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button type="button"
                                    class="whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                                <svg class="-ml-1 mr-2 h-5 w-5 text-white-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <span>Message</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block md:hidden mt-6 min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">{{ $worker->company->name }}</h1>
                </div>
            </div>
        </div>

        <div
            class="my-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                                Applicant Information</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <a href="mailto:{{ $worker->email }}" class="font-medium text-blue-600 hover:text-blue-500">{{ $worker->email }}</a>
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                    @foreach($worker->phoneNumbers as $phoneNumber)
                                        <a href="tel:{{$phoneNumber->number}}" class="font-medium text-blue-600 hover:text-blue-500">{{$phoneNumber->number}}</a>@if(!$loop->last),@endif
                                    @endforeach
                                    </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Skills</dt>
                                    @foreach($worker->company->skills as $skill)
                                        <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                            {{ $skill->name }}
                                        </dd>
                                    @endforeach
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">About</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $worker->company->about }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>

                <!-- Comments-->
                <livewire:comment :company="$worker->company" :user="$worker" />


            </div>

            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">My realisations</h2>

                    <div>
                        <!-- Activity Feed -->
                        <div>
                            <div class="flow-root mt-6">
                                <ul role="list" class="-my-5 divide-y divide-gray-200 max-h-80 overflow-y-auto">
                                    <li class="py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                     src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900">Leonard Krasner</p>
                                                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet,
                                            </div>
                                            <div>
                                                <a href="#"
                                                   class="button-show-picture-1 inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    Photos </a>
                                                <div></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="content-show-pictures-1 hidden fixed z-10 inset-0 overflow-y-auto">
                            <div
                                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <!-- Background overlay -->
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <!-- Modal content -->
                                <div
                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-screen-lg sm:w-full"
                                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                            NAME OF WORK</h3>
                                        <!-- Slider main container -->
                                        <swiper-container class="mySwiper" css-mode="true" navigation="true"
                                                          keyboard="true"
                                                          mousewheel="true" slides-per-view="auto" space-between="30">
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                        </swiper-container>

                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="button"
                                                class="closebtn-1 mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        >
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script>
        // JavaScript code
        document.addEventListener("DOMContentLoaded", function () {
            const pictureButtons = document.querySelectorAll(".button-show-picture-1");
            const modalContainers = document.querySelectorAll(".content-show-pictures-1");

            pictureButtons.forEach(function (button, index) {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    modalContainers[index].classList.remove("hidden");
                });
            });

            modalContainers.forEach(function (modalContainer) {
                modalContainer.addEventListener("click", function (event) {
                    const targetClassList = event.target.classList;
                    if (
                        targetClassList.contains("content-show-pictures-1") ||
                        targetClassList.contains("closebtn-1")
                    ) {
                        modalContainer.classList.add("hidden");
                    }
                });
            });
        });

    </script>

@endsection
