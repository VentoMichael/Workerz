@extends('layouts.layout')
@section('title', 'Contact Us')
@section('description', 'Contact us to learn more about our platform and how we can help you find and hire independent workers for your needs. Get in touch today!')
@section('keywords', 'contact us, Workerz, independent workers, hire workers, find workers, job postings, small businesses, services, products, ads')


@section('content')
    <section class="bg-white">
        <!-- Header -->
        <div class="relative bg-gray-800 pb-32">
            <div class="absolute inset-0">
                <img class="w-full h-full object-cover"
                     src="{{asset('img/pexels-yan-krukau-7793699.jpg')}}"
                     alt="">
                <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
            </div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Contact us</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-300">Get in touch with Workerz through our contact form or
                    email. We're here to answer any questions you have about our services or provide support for any
                    issues you may be experiencing. Don't hesitate to reach out to us.</p>
            </div>
        </div>
        <section class="bg-gray-100">
            <div class="-mt-32 mx-auto relative z-10 px-4 max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8"
                     aria-labelledby="contact-heading">
                <h2 class="sr-only" id="contact-heading">Connect with Us</h2>
                <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">

                    <section class="flex flex-col bg-white rounded-2xl shadow-xl">
                        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                            <div
                                class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                <!-- Heroicon name: outline/support -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-blue-gray-900">Technical Support</h3>
                            <p class="mt-4 text-base text-blue-gray-500">Our technical support team is available to
                                assist you with any issues you may encounter while using our products or services. We
                                are committed to providing prompt and effective solutions to ensure your
                                satisfaction.</p>
                        </div>
                        <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                            <a href="?subject=Technical%20support#form"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </section>

                    <section class="flex flex-col bg-white rounded-2xl shadow-xl">
                        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                            <div
                                class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                <!-- Heroicon name: outline/newspaper -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-blue-gray-900">Media Inquiries</h3>
                            <p class="mt-4 text-base text-blue-gray-500">For media inquiries or interview requests,
                                please contact our press team. We are always happy to discuss our company and our
                                mission with journalists and media outlets.</p>
                        </div>
                        <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                            <a href="?subject=Media%20inquiries#form"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </section>
                    <section class="flex flex-col bg-white rounded-2xl shadow-xl">
                        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                            <div
                                class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                <!-- Heroicon name: outline/phone -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-blue-gray-900">Partnership Opportunities</h3>
                            <p class="mt-4 text-base text-blue-gray-500">We are open to exploring partnership
                                opportunities with companies and organizations that share our values and goals. If you
                                are interested in partnering with us, please reach out to our partnership team for more
                                information.</p>
                        </div>
                        <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                            <a href="?subject=Partnership%20opportunities#form"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </section>
                </div>
            </div>

            <livewire:contact-form/>
        </section>
        <!-- FAQ -->
        @include('layouts.faq')
    </section>

@endsection

@section('scripts')
    @vite('resources/js/faq.js')
@endsection
