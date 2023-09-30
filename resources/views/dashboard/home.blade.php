@extends('layouts.dashboard.layout')
@section('title', 'Dashboard')
@section('description', 'Welcome to your dashboard! Manage your profile, settings, and activities.')
@section('keywords', 'dashboard, manage profile, settings, activities')

@section('content')
    @if(!auth()->user()->tutorial_shown)
        @include('components.tutorial-dashboard')
    @endif


    <div class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <section class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <h1 class="sr-only">
                My dashboard
            </h1>

            @include('layouts.dashboard.secondHeader')

            <div id="main_content" class="py-6 px-4 sm:p-6 lg:pb-8 flex w-full gap-4 col-span-9 flex-col">
                <section class="w-full bg-white rounded-lg shadow">
                    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                        <div>
                            <h2 class="leading-none text-3xl font-bold text-gray-900">Interactions Over the 7 last
                                days</h2>
                            <p class="text-base font-normal text-gray-500">Activity Trends
                            <p>
                        </div>
                        <div
                            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 text-center">
                            23%
                            <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div id="labels-chart" class="px-2.5"></div>
                </section>


                <div class="flex w-full gap-4 col-span-9">
                    @if(auth()->user()->hasRole(1))

                        <section class="w-2/4 bg-white border border-gray-200 rounded-lg shadow flex flex-col">
                            <h2 class="text-lg font-semibold text-gray-900 p-5 sr-only">My profile</h2>
                            <div class="relative">
                                <img class="rounded-t-lg w-full h-32 object-cover"
                                     srcset="
                                     @if (is_array($user->company->backgroundUpload))
                                     @foreach($user->company->backgroundUpload as $imagePath)
                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                     @endif
                                         "
                                     src="{{ asset('storage/' . (is_array($user->company->backgroundUpload) ? $user->company->backgroundUpload[0] : $user->company->backgroundUpload)) }}"
                                     alt="Logo of {{ $user->company->name }}"/>
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-blue-400 to-indigo-400 opacity-60"></div>
                                @if (is_string(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) && strpos(\Illuminate\Support\Facades\Auth::user()->company->logoUpload, 'initials') !== false)
                                    <img
                                        class="rounded-full h-20 w-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                        src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->company->logoUpload . '.svg') }}"
                                        alt="Logo of {{ \Illuminate\Support\Facades\Auth::user()->company->name }}"/>
                                @else
                                    <img
                                        class="rounded-full h-20 w-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                        srcset="
            @if (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload))
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->company->logoUpload as $imagePath)
                                        {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                        @endif
                                            "
                                        src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) ? \Illuminate\Support\Facades\Auth::user()->company->logoUpload[0] : \Illuminate\Support\Facades\Auth::user()->company->logoUpload)) }}"
                                        alt="Logo of {{ \Illuminate\Support\Facades\Auth::user()->company->name }}"/>
                                @endif
                            </div>
                            <div class="p-5 flex h-full flex-col justify-between">
                                <div>
                                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $user->company->name }}</p>
                                    <p class="text-ellipsis mb-3 font-normal text-gray-700 break-words">{{ \Illuminate\Support\Str::limit($user->company->about,120) }}</p>
                                </div>
                                <a href="{{ route('dashboard.profil') }}"
                                   class="mt-4 w-full max-w-xl whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                                    Edit my profile </a>
                            </div>
                        </section>
                        <section class="w-2/4 bg-white border border-gray-200 rounded-lg shadow">
                            <div class="p-5 flex flex-col justify-between h-full">
                                <h2 class="text-lg font-semibold text-gray-900">Recent Comments</h2>

                                <!-- List of recent comments -->
                                <ul class="space-y-4 divide-y">
                                    <!-- Comment item -->
                                    <li class="pt-4">

                                        <div class="flex items-center mb-4 space-x-4">
                                            <img class="h-10 w-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                                 alt="">
                                            <div class="space-y-1 font-medium">
                                                <p>Jese Leos
                                                    <time datetime="2014-08-16 19:00"
                                                          class="block text-sm text-gray-500">Published on
                                                        <time datetime="2017-03-03 19:00">March 3, 2017</time>
                                                    </time>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-2 text-gray-700">This is my third Invicta Pro Diver. They are just
                                            fantastic value for money...</p>

                                    </li>
                                    <li class="pt-4">

                                        <div class="flex items-center mb-4 space-x-4">
                                            <img class="h-10 w-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                                 alt="">
                                            <div class="space-y-1 font-medium">
                                                <p>Jese Leos
                                                    <time datetime="2014-08-16 19:00"
                                                          class="block text-sm text-gray-500">Published on
                                                        <time datetime="2017-03-03 19:00">March 3, 2017</time>
                                                    </time>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-2 text-gray-700">This is my third Invicta Pro Diver. They are just
                                            fantastic value for money...</p>

                                    </li>

                                    <!-- Add more comment items as needed -->
                                </ul>

                                <!-- View all comments link -->
                                <x-button type="submit" kind="primary" class="mt-4 max-w-xl">See all messages
                                </x-button>
                            </div>
                        </section>
                    @endif

                </div>
            </div>
        </section>
    </div>





@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // ApexCharts options and config
        window.addEventListener("load", function () {
            let options = {
                // set the labels option to true to show the labels on the X and Y axis
                xaxis: {
                    show: true,
                    categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500'
                        },
                        formatter: function (value) {
                            return value;
                        }
                    }
                },
                series: [
                    {
                        name: "Profile viewed",
                        data: [10, 11, 3, 41, 2, 4],
                        color: "#5850EC",
                    },
                    {
                        name: "Messages received",
                        data: [1, 3, 4, 12, 32, 2],
                        color: "#2E82F0",
                    },
                    {
                        name: "Profile shared",
                        data: [0, 0, 1, 2, 21, 31],
                        color: "#7E3AF2",
                    },
                ],
                chart: {
                    sparkline: {
                        enabled: false
                    },
                    height: "100%",
                    width: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false,
                },
            }

            if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                chart.render();
            }
        });
    </script>
    @vite('resources/js/tutorial-dashboard.js')


@endsection


