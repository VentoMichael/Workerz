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
            <div x-show="openFilterMobile" x-cloak @click.away="openFilterMobile = false"
                 class="fixed inset-0 flex z-40 sm:hidden" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
                <div
                    class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
                    <div class="px-4 flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button @click="openFilterMobile = false" type="button"
                                class="button_filter_mobile mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4">
                        <section class="border-t border-gray-200 px-4 py-6">
                            <h3 @click="openCategory = !openCategory" class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse question button -->
                                <button type="button"
                                        class="button_filter_category px-2 py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Category </span>
                                    <span class="ml-6 flex items-center">
                                    <svg x-bind:class="{ 'rotate-0': !openCategory, 'rotate-180': openCategory }"
                                         class="chevron_category rotate-0 h-5 w-5 transform"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                      <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                    </svg>
                                  </span>
                                </button>
                            </h3>
                            <div x-show="openCategory" class="content_filter_category pt-6" id="filter-section-0">
                                <div class="space-y-6">

                                    <fieldset>

                                        <legend class="sr-only">Category</legend>
                                        @foreach($userSkillsWithCount as $category => $count)
                                            <div class="flex items-center mt-0">
                                                <input id="filter-mobile-category-{{ $loop->index }}" name="category[]"
                                                       value="{{ $category }}"
                                                       type="checkbox"
                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-{{ $loop->index }}"
                                                       class="ml-3 text-sm font-medium text-gray-700">
                                                    {{ $category }} ({{ $count }})</label>
                                            </div>
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </section>

                        <section class="border-t border-gray-200 px-4 py-6">
                            <h3 @click="openRegions = !openRegions" class="-mx-2 -my-3 flow-root">
                                <button type="button"
                                        class="filter_region px-2 py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                        aria-controls="filter-section-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Region </span>
                                    <span class="ml-6 flex items-center">
                    <svg class="chevron_region rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"/>
                    </svg>
                  </span>
                                </button>
                            </h3>
                            <div x-show="openRegions" class="content_filter_regions pt-6" id="filter-section-1">
                                <div class="space-y-6">
                                    <fieldset>

                                        <legend class="sr-only">Region</legend>
                                        @foreach($userRegionsWithCount as $region => $count)
                                            <div class="flex items-center mt-0">
                                                <input id="filter-mobile-region-{{ $loop->index }}" name="region[]"
                                                       value="{{ $region }}"
                                                       type="checkbox"
                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-region-{{ $loop->index }}"
                                                       class="ml-3 text-sm font-medium text-gray-700">
                                                    {{ $region }} ({{ $count }})</label>
                                            </div>
                                        @endforeach
                                    </fieldset>

                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>


            <section class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8">
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

                <section aria-labelledby="filter-heading" class="border-t border-gray-200 py-6">
                    <h3 id="filter-heading" class="sr-only">Product filters</h3>

                    <div x-data="{ openFilter: false, openCategory: false, openRegions: false }"
                         class="flex items-center justify-between">
                        <div class="relative z-10 inline-block text-left">
                            <div>
                                <button @click="openFilter = !openFilter" type="button"
                                        class="filter_sort group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                                    Sort
                                    <svg x-bind:class="{ 'rotate-0': !openFilter, '-rotate-180': openFilter }"
                                         class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                            <fieldset>
                                <legend class="sr-only">Sort</legend>
                                <div x-cloak x-show="openFilter" @click.away="openFilter = false"
                                     class="filter_sort_content origin-top-left absolute left-0 z-10 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                     role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button"
                                     tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="#"
                                           class="block px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-0"> Most Popular </a>

                                        <a href="#"
                                           class="block px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-1"> Best Rating </a>

                                        <a href="#"
                                           class="block px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-2"> Newest </a>

                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <button @click="openFilterMobile = true" type="button"
                                class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">
                            Filters
                        </button>

                        <div x-data="{ openCategory: false, openRegions: false }"
                             class="z-20 sm:flex hidden sm:items-baseline sm:space-x-8">
                            <div id="desktop-menu" class="relative z-10 inline-block text-left">
                                <div class="filter_sort">
                                    <button @click="openCategory = !openCategory" type="button"
                                            class="filter_category group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                            aria-expanded="false">
                                        <span>Category</span>

                                        <span
                                            class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums">1</span>
                                        <svg x-bind:class="{ 'rotate-0': !openCategory, '-rotate-180': openCategory }"
                                             class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                                <div x-cloak x-show="openCategory" @click.away="openCategory = false"
                                     class="w-64 max-w-xs filter_content_category origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">

                                    <fieldset>

                                        <legend class="sr-only">Category</legend>
                                        <form class="space-y-4">
                                            @foreach($userSkillsWithCount as $category => $count)
                                                <div class="flex items-center mt-0">
                                                    <input id="filter-category-{{ $loop->index }}" name="category[]"
                                                           value="{{ $category }}"
                                                           type="checkbox"
                                                           class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-{{ $loop->index }}"
                                                           class="ml-3 text-sm font-medium text-gray-700">
                                                        {{ $category }} ({{ $count }})</label>
                                                </div>
                                            @endforeach
                                        </form>
                                    </fieldset>
                                </div>
                            </div>

                            <div x-data="{ openRegions: false }" id="desktop-menu"
                                 class="relative z-10 inline-block text-left">
                                <div>
                                    <button @click="openRegions = !openRegions" type="button"
                                            class="filter_regions group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                            aria-expanded="false">
                                        <span>Regions</span>
                                        <svg x-bind:class="{ 'rotate-0': !openRegions, '-rotate-180': openRegions }"
                                             class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                                <div x-cloak x-show="openRegions" @click.away="openRegions = false"
                                     class="filter_content_regions origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <fieldset>
                                        <legend class="sr-only">Regions</legend>
                                        <form class="space-y-4">
                                            @foreach($userRegionsWithCount as $region => $count)
                                                <div class="flex items-center mt-0">
                                                    <input id="filter-region-{{ $loop->index }}" name="region[]"
                                                           value="{{$region}}"
                                                           type="checkbox"
                                                           class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-region-{{ $loop->index }}"
                                                           class="ml-3 pr-6 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        {{ $region }} ({{ $count }})</label>
                                                </div>
                                            @endforeach
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </section>
        </section>
        <div class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4 ">
            <section x-show="activeTab === 'workers'">
                <h3 style="z-index: -10" class="sr-only">Most popular workers</h3>
                @if(count($workers) > 0)
                    <p class="text-xs mb-2">About {{ count($workers) }} result{{ count($workers) > 1 ? 's': '' }}</p>
                    <div id="workers-section" role="list" class="flex md:grid md:grid-cols-500px flex-col gap-4">
                        @foreach($workers as $worker)
                            @include('components.worker', ['worker' => $worker])
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No workers found.</p>
                @endif
            </section>

            <section x-show="activeTab === 'ads'"
                     class="section-tab-content hidden">
                <h3 style="z-index: -10" class="text-transparent absolute">Most popular ads</h3>
                @include('components.ad')

            </section>

        </div>

        @include('layouts.cta')
    </section>

@endsection

@section('scripts')
    <script>

    </script>
@endsection

