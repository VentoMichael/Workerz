@extends('layouts.layout')
@section('title', 'Browse Talented Freelancers')
@section('description', 'Discover talented freelancers on our platform. Browse through their skills, portfolio, and reviews from other clients. Hire the right person for your project today.')
@section('keywords', ' freelancers, skills, portfolio, reviews, hire')

@section('content')

    <section>
        <h1 class="sr-only">Workers page</h1>
        <div class="bg-gray-50" x-data="{ openFilterMobile:false, openFilter: false, openCategory: false, openRegions: false }">
            <div x-show="openFilterMobile" x-cloak @click.away="openFilterMobile = false" class="fixed inset-0 flex z-40 sm:hidden" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
                <div class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
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
                    <form  class="mt-4">
                        <section class="border-t border-gray-200 px-4 py-6">
                            <h3 @click="openCategory = !openCategory"class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse question button -->
                                <button  type="button"
                                        class="button_filter_category px-2 py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Category </span>
                                    <span class="ml-6 flex items-center">
                                    <svg x-bind:class="{ 'rotate-0': !openCategory, 'rotate-180': openCategory }" class="chevron_category rotate-0 h-5 w-5 transform"
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
                                                <input id="filter-mobile-category-{{ $loop->index }}" name="category[]" value="{{ $category }}"
                                                       type="checkbox"
                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-{{ $loop->index }}" class="ml-3 text-sm text-gray-500">
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
                            <div x-show="openRegions" class="content_filter_regions pt-6" id="filter-section-1" >
                                <div class="space-y-6">
                                    <fieldset>

                                        <legend class="sr-only">Region</legend>
                                        @foreach($userRegionsWithCount as $region => $count)
                                            <div class="flex items-center mt-0">
                                                <input id="filter-mobile-region-{{ $loop->index }}" name="region[]" value="{{ $region }}"
                                                       type="checkbox"
                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-region-{{ $loop->index }}" class="ml-3 text-sm text-gray-500">
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
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find the Right Worker for Your
                        Needs</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Looking for a skilled and reliable worker
                        for your project? Our platform connects you with a diverse range of independent professionals
                        who are ready to get the job done. With just a few clicks, you can find the perfect match for
                        your needs and get started on your project right away.</p>
                </div>

                <section aria-labelledby="filter-heading" class="border-t border-gray-200 py-6">
                    <h3 id="filter-heading" class="sr-only">Product filters</h3>

                    <div x-data="{ openFilter: false, openCategory: false, openRegions: false }" class="flex items-center justify-between">
                        <div class="relative z-10 inline-block text-left">
                            <div >
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
                                        <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-0"> Most Popular </a>

                                        <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-1"> Best Rating </a>

                                        <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900"
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

                        <div x-data="{ openCategory: false, openRegions: false }" class="sm:flex hidden sm:items-baseline sm:space-x-8">
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
                                                    <input id="filter-category-{{ $loop->index }}" name="category[]" value="{{ $category }}"
                                                           type="checkbox"
                                                           class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-{{ $loop->index }}" class="ml-3 text-sm text-gray-700">
                                                        {{ $category }} ({{ $count }})</label>
                                                </div>
                                            @endforeach
                                        </form>
                                    </fieldset>
                                </div>
                            </div>

                            <div x-data="{ openRegions: false }" id="desktop-menu" class="relative z-10 inline-block text-left">
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
                                <div x-cloak x-show="openRegions" @click.away="openRegions = false" class="filter_content_regions origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <fieldset>
                                        <legend class="sr-only">Regions</legend>
                                        <form class="space-y-4">
                                            @foreach($userRegionsWithCount as $region => $count)
                                                <div class="flex items-center mt-0">
                                                    <input id="filter-region-{{ $loop->index }}" name="region[]" value="{{$region}}"
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
        </div>
        <div class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4 ">

            <section>
                <h3 style="z-index: -10" class="sr-only">Most popular workers</h3>
                <p class="text-xs mb-2">About {{ count($workers) }} result{{ count($workers) > 1 ? 's': '' }}</p>
                <div id="workers-section" role="list" class="flex md:grid md:grid-cols-500px flex-col gap-4">
                    @foreach($workers as $worker)
                        @include('components.worker', ['worker' => $worker])
                    @endforeach
                </div>
            </section>

        </div>
    </section>
@endsection
@section('scripts')


    <script>
        function copyUrl(url) {
            const input = document.createElement('input');
            input.value = url;
            document.body.appendChild(input);

            input.select();
            document.execCommand('copy');

            document.body.removeChild(input);
        }
    </script>
@endsection
