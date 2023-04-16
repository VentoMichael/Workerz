@extends('layouts.layout')
@section('title', 'Contact Us')
@section('description', 'Learn more about Workerz, our mission, and our team.')
@section('keywords', 'Workerz, about us, mission statement, team')


@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <section>
    <div class="relative bg-white overflow-hidden">

    <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

                <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:block"> About Workerz </span>
                            <span class="block text-indigo-600 xl:inline">and Our Mission</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Learn more about Workerz, a platform that connects skilled freelancers with businesses
                            looking for talent. Our mission is to make it easy for freelancers to find work and for
                            businesses to find the right talent to help them grow. Find out how we got started and what
                            sets us apart from other freelancer job boards.</p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                                <a href="{{route('sign-up.role')}}">
                                    <x-button kind="primary-big">Get started</x-button>
                                </a>
                                <a href="{{route('how-it-works')}}">
                                    <x-button kind="secondary-big">Learn more</x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                 src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80"
                 alt="">
        </div>
    </div>

    <div class="py-16 xl:py-36 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
            <section class="max-w-max lg:max-w-7xl mx-auto">
                <div class="relative z-10 mb-8 md:mb-2 md:px-6">
                    <div class="text-base max-w-prose lg:max-w-none">
                        <p class="leading-6 text-indigo-600 font-semibold tracking-wide uppercase">How We Got
                            Started</p>
                        <h2 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Our
                            Story</h2>
                    </div>
                </div>
                <div class="relative">
                    <svg class="hidden md:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384"
                         fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="95e8f2de-6d30-4b7e-8159-f791729db21b" x="0" y="0" width="20" height="20"
                                     patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#95e8f2de-6d30-4b7e-8159-f791729db21b)"/>
                    </svg>
                    <svg class="hidden md:block absolute bottom-0 left-0 -mb-20 -ml-20" width="404" height="384"
                         fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="7a00fe67-0343-4a3c-8e81-c145097a3ce0" x="0" y="0" width="20" height="20"
                                     patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#7a00fe67-0343-4a3c-8e81-c145097a3ce0)"/>
                    </svg>
                    <div class="relative md:bg-white md:p-6">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-6">
                            <div class="prose prose-indigo prose-lg text-gray-500 lg:max-w-none">
                                <p class="mb-3 text-gray-500">At Workerz, we believe that everyone should have access to
                                    the tools and resources they need to succeed in their careers. That's why we created
                                    a platform that connects skilled workers with the right opportunities.</p>
                                <p class="mb-3 text-gray-500">Our journey began in 2023, when our founder Vento Michael
                                    recognized a need for a better way to match workers with jobs. Since then, we've
                                    grown into a team of dedicated professionals who are passionate about helping people
                                    achieve their goals.</p>
                            </div>
                            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 lg:mt-0">
                                <p class="mb-3 text-gray-500">Our mission is simple: to empower workers and employers by
                                    providing a platform that makes it easy to find the right fit. Whether you're
                                    looking for your next project or your next employee, Workerz has you covered.</p>
                                <p class="mb-3 text-gray-500"> We believe that by bringing together talented individuals
                                    and innovative companies, we can create a better future for everyone. That's why
                                    we're committed to providing the best possible experience for our users, and to
                                    always staying at the forefront of the industry.</p>
                            </div>
                        </div>
                        <div class="mt-8 inline-flex rounded-md shadow">
                            <a href="{{route('sign-up.role')}}">
                                <x-button kind="primary-big">Join us now</x-button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <div class="bg-gray-50">
            <section class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:pt-24 lg:px-8">
                <h2 class="text-3xl font-extrabold text-black tracking-tight">Why Choose Workerz?</h2>
                <p class="mt-4 max-w-3xl text-lg text-gray-500">At Workerz, we believe that freelancers and businesses
                    should have a platform that is easy to use, affordable, and offers many benefits. Here are just some
                    of the reasons why choosing Workerz is the right decision for your business or freelance career.</p>
                <div
                    class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                    <section>
                        <div>
              <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/inbox -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Access to a Wide Range of Skilled Workers</h3>
                            <p class="mt-2 text-base text-gray-500">With Workerz, you have access to a diverse pool of
                                skilled workers in Belgium. Whether you need a graphic designer, web
                                developer, or virtual assistant, you'll find the right talent to suit your needs.</p>
                        </div>
                    </section>

                    <section>
                        <div>


                            <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/trash -->
                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#ffffff" stroke-width="2"></path> <path d="M8 10.5H13" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 13.5H12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 8C14.3732 7.37209 13.5941 7 12.7498 7C10.6788 7 9 9.23858 9 12C9 14.7614 10.6788 17 12.7498 17C13.5941 17 14.3732 16.6279 15 16" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> </g></svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Cost-Effective Solutions</h3>
                            <p class="mt-2 text-base text-gray-500">With Workerz, you can hire skilled workers at a
                                fraction of the cost of hiring a full-time employee. You can set your own budget,
                                negotiate rates with individual freelancers.</p>
                        </div>
                    </section>

                    <section>
                        <div>
                            <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/users -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Flexible Hiring</h3>
                            <p class="mt-2 text-base text-gray-500">Workerz allows you to hire freelancers on a
                                project-by-project basis, giving you the flexibility to scale your workforce up or down
                                as needed. You can hire freelancers for short-term projects, or long-term contracts,
                                depending on your needs.</p>
                        </div>
                    </section>

                    <section>
                        <div>
              <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/pencil-alt -->
                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 8V12L15 15" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <circle cx="12" cy="12" r="9" stroke="#ffffff" stroke-width="2"></circle> </g></svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Time Savings</h3>
                            <p class="mt-2 text-base text-gray-500">By using Workerz, you can save valuable time that you would otherwise spend researching employees. Workerz takes care of all the analytics tasks, leaving you with more time to focus on your core business activities.</p>
                        </div>
                    </section>

                    <section>
                        <div>
              <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/document-report -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Quality Results</h3>
                            <p class="mt-2 text-base text-gray-500">Workerz provides a platform where you can find
                                top-rated freelancers who have been vetted for quality and reliability. You can review
                                each freelancer's portfolio and ratings before hiring, ensuring that you are getting the
                                best possible talent.</p>
                        </div>
                    </section>

                    <section>
                        <div>

              <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/chat-alt -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Easy Communication</h3>
                            <p class="mt-2 text-base text-gray-500">Workerz provides a streamlined communication
                                platform that allows you to stay in touch with your freelancers throughout the project.
                                You can communicate directly with your freelancers through the platform, eliminating the
                                need for email or phone tag.</p>
                        </div>
                    </section>

                    <section>
                        <div>
                            <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/reply -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                </svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Global Reach</h3>
                            <p class="mt-2 text-base text-gray-500">With Workerz, you can hire freelancers from anywhere
                                in Belgium, giving you access to a diverse pool of talent with unique skill sets and
                                perspectives. This can help you to expand your projects.</p>
                        </div>
                    </section>

                    <section>
                        <div>
              <span class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 bg-opacity-100 bg-blue-500">
                <!-- Heroicon name: outline/heart -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
              </span>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-700">Increased Productivity</h3>
                            <p class="mt-2 text-base text-gray-500">By outsourcing tasks to skilled freelancers, you can free up your own time and focus on your core business activities.</p>
                        </div>
                    </section>
                </div>
            </section>
        </div>


        <section class="bg-white">
            <div
                class="max-w-4xl mx-auto py-16 px-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Ready to get started?</span>
                    <span
                        class="-mb-1 pb-1 block bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">Get in touch or create an account.</span>
                </h2>
                <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                    <a href="{{route('how-it-works')}}">
                        <x-button kind="secondary">Learn more</x-button>
                    </a>
                    <a href="{{route('sign-up.role')}}">
                        <x-button kind="primary">Get started</x-button>
                    </a>
                </div>
            </div>
        </section>
    </section>

@endsection
