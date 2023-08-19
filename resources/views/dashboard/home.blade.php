@extends('layouts.dashboard.layout')
@section('title', 'Dashboard')
@section('description', 'Welcome to your dashboard! Manage your profile, settings, and activities.')
@section('keywords', 'dashboard, manage profile, settings, activities')

@section('content')

    <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <section class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <h1 class="sr-only">
                My dashboard
            </h1>
            @include('layouts.dashboard.secondHeader')

            <div class="flex w-full gap-4 col-span-9">
                <section class="w-1/3 w-max bg-white border border-gray-200 rounded-lg shadow">
                    <h2 class="sr-only">My profile</h2>
                    <div class="relative">
                        <img class="rounded-t-lg w-full h-32 object-cover"
                             src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                             alt=""/>
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-500 to-indigo-600 opacity-60"></div>
                        <img
                            class="rounded-full h-20 w-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                            src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                            alt="Profile Picture"/>
                    </div>
                    <div class="p-5">
                        <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Marco Piombo</p>
                        <p class="mb-3 font-normal text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Beatae debitis fuga laboriosam quibusdam rerum sint ullam</p>
                        <x-button type="submit" kind="primary" class="mt-4 w-full max-w-xs">See my profile</x-button>
                    </div>
                </section>
                <section class="w-2/3 w-max bg-white border border-gray-200 rounded-lg shadow">
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
                                <p class="mb-2 text-gray-500">This is my third Invicta Pro Diver. They are just
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
                                <p class="mb-2 text-gray-500">This is my third Invicta Pro Diver. They are just
                                    fantastic value for money...</p>

                            </li>

                            <!-- Add more comment items as needed -->
                        </ul>

                        <!-- View all comments link -->
                        <x-button type="submit" kind="primary" class="max-w-xs mt-4 w-full">See all messages</x-button>
                    </div>
                </section>

            </div>

        </section>
    </main>



@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Get sales data from PHP
        const salesData = @json($salesData);

        // Data for the doughnut chart
        const data = {
            labels: Object.keys(salesData),
            datasets: [{
                data: Object.values(salesData),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800']
            }]
        };

        // Chart configuration
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
            }
        };

        // Create the doughnut chart
        const ctx = document.getElementById('doughnutChart').getContext('2d');
        new Chart(ctx, config);
    </script>
@endsection

