@extends('layouts.layout')
@section('title', 'Homepage')
@section('description', 'Looking for independent workers or small businesses to help with your next project? Workerz connects clients with skilled independent workers and makes it easy to browse services and products. Sign up today!')
@section('keywords', 'independent workers, small businesses, services, products, clients, skilled, sign up, sign in')

@section('content')
    @if(session('successMessage'))
        <div
            class="z-10 flex gap-5 fixed right-8 bottom-4 bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 px-5 py-4 shadow-md"
            role="alert">
            <div class="flex gap-2">

                <div class="py-1">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 svg-success" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg"
                         height="1em" viewBox="0 0 512 512">
                        <style>.svg-success {
                                fill: #03543f
                            }</style>
                        <path
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Success !</p>
                    <p class="text-sm">{{ session('successMessage') }}</p>
                </div>
            </div>
            <button id="closeBtn" type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-800 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                    aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <section x-data="{ activeTab: 'workers' }">
        <div class="pt-10 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden bg-gray-900">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div
                        class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                        <div class="lg:py-24">
                            <a href="{{route('login')}}"
                               class="inline-flex items-center text-white bg-black rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
                            <span
                                class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full">Workerz</span>
                                <span class="ml-4 text-sm">Empowering Independent Workers</span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="ml-2 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                <span class="block">Your go-to platform</span>
                                <span
                                    class="pb-3 block bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-indigo-600 sm:pb-5"> for independent work</span>
                            </h1>
                            <p class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">Workerz connects
                                independent
                                workers with clients in a simple and efficient way. Search by zip code or occupation,
                                and
                                find the perfect match for your needs. Join our community today and take control of your
                                future.</p>

                        </div>
                    </div>
                    <div class="mt-12 -mb-16 lg:m-0 lg:relative">
                        <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                            <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                 src="{{asset('img/home.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="bg-gray-50">

            <section class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8 -mb-4">
                <div class="py-16">
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find Your Match Today</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Discover a diverse range of independent
                        workers and job opportunities in just a few clicks. Our platform simplifies the search process,
                        so
                        you can quickly find the perfect match for your needs.</p>
                </div>
                <div>
                    <div class="block" id="tabs-section">
                        <nav class="flex space-x-4 p-4 justify-center" aria-label="Tabs">
                            <a x-on:click="activeTab = 'workers'"
                               x-bind:class="[activeTab === 'workers' ? 'bg-purple-600 text-white' : 'text-gray-600']"
                               data-tab="workers" aria-current="page"
                               class="tab-link text-gray-600 px-3 py-2 font-medium text-sm rounded-md border cursor-pointer">Workers</a>
                            <a x-on:click="activeTab = 'ads'"
                               x-bind:class="[activeTab === 'ads' ? 'bg-purple-600 text-white' : 'text-gray-600']"
                               data-tab="ads"
                               class="tab-link text-gray-600 px-3 py-2 font-medium text-sm rounded-md border cursor-pointer">Ads</a>
                        </nav>

                    </div>
                </div>


            </section>
        </section>
        <div class="mx-auto my-4 ">
            <section x-show="activeTab === 'workers'">
                <h3 style="z-index: -10" class="sr-only">Most popular workers</h3>
                <div id="workers-section" role="list" class="flex md:grid md:grid-cols-500px flex-col gap-4">
                    <livewire:preview-list-workers/>

                </div>
            </section>

            <section x-show="activeTab === 'ads'"
                     class="section-tab-content ">
                <h3 style="z-index: -10" class="text-transparent absolute">Most popular ads</h3>
                <div id="ads-section" role="list" class="flex md:grid md:grid-cols-500px flex-col gap-4">
                    <livewire:preview-list/>
                </div>
            </section>

        </div>

        @include('layouts.cta')
    </section>

@endsection

@section('scripts')
    <script>

    </script>
@endsection

