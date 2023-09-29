@extends('layouts.layout')
@section('title', 'Browse Ads')
@section('description', 'Browse all the latest ads posted on Workerz. Find the best freelancers for your project needs.')
@section('keywords', 'Browse Ads, Freelancers, Projects, Services, Workerz')

@section('content')

    <section>
        <h1 class="sr-only">
            Ads page
        </h1>
        <div class="bg-gray-50"
             x-data="{ openFilterMobile:false, openFilter: false, openCategory: false, openRegions: false }">
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
                                        @foreach($adSkillsWithCount as $category => $count)
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
                                        @foreach($adRegionsWithCount as $region => $count)
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
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find the Right Job Today</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Explore a wide range of job opportunities
                        posted by
                        people and businesses in your area. Our platform makes it easy to discover and apply for jobs
                        that match your
                        skills and interests.</p>
                </div>

                <section aria-labelledby="filter-heading" class="border-t border-gray-200 py-6">
                    <h3 id="filter-heading" class="sr-only">Product filters</h3>

                    <div x-data="{ openFilter: false, openCategory: false, openRegions: false }"
                         class="flex items-center justify-between">
                        <div class=" relative z-10 inline-block text-left">
                            <div>
                                <button @if(count($ads) > 0) @click="openFilter = !openFilter" @endif type="button"
                                        class="@if(count($ads) === 0) opacity-70 cursor-not-allowed @endif filter_sort group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
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
                                        <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-0"> Most Popular </a>

                                        <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700"
                                           role="menuitem"
                                           tabindex="-1" id="mobile-menu-item-1"> Best Rating </a>

                                        <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700"
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
                                    <button @if(count($ads) > 0) @click="openCategory = !openCategory"
                                            @endif type="button"
                                            class="@if(count($ads) === 0) opacity-70 cursor-not-allowed @endif filter_category group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
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
                                            @foreach($adSkillsWithCount as $category => $count)
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
                                    <button @if(count($ads) > 0) @click="openRegions = !openRegions"
                                            @endif type="button"
                                            class="@if(count($ads) === 0) opacity-70 cursor-not-allowed @endif filter_regions group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
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
                                            @foreach($adRegionsWithCount as $region => $count)
                                                <div class="flex items-center mt-0">
                                                    <input id="filter-region-{{ $loop->index }}" name="region[]"
                                                           value="{{$region}}"
                                                           type="checkbox"
                                                           class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-region-{{ $loop->index }}"
                                                           class="ml-3 pr-6 text-sm font-medium text-gray-700">
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
                @if(count($ads) > 0)
                    <p class="text-xs mb-2">About {{ count($ads) }} result{{ count($ads) > 1 ? 's': '' }}</p>
                    <div x-data="{ selectedPreview: window.innerWidth > 768 ? {{ $ads[0]->id }} : null }"
                         class="grid grid-cols-1 gap-2 md:max-w-7xl md:grid-flow-col-dense md:grid-cols-3">
                        <div
                            class="max-h-screen overflow-y-hidden sm:overflow-y-auto space-y-6 md:col-start-1 sm:overflow-hidden p-1">
                            @foreach($ads as $ad)

                                <div @click="selectedPreview = {{ $ad->id }}" id="preview-ad-{{ $ad->id }}">
                                    <section id="title-of-ad-{{ $ad->id }}"
                                             class="cursor-pointer title-of-ad bg-white shadow sm:rounded-md block overflow-visible hover:bg-indigo-50"
                                             :class="{ 'border-indigo-500 ring-2 ring-indigo-500 bg-indigo-50': activeAd === {{ $ad->id }} }">

                                        <div
                                            class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 md:grid-cols-1 lg:grid-cols-48-1">

                                            <div class="flex-shrink-0 self-center">
                                                @if(!is_array($ad->user->avatarUpload) && strpos($ad->user->avatarUpload, 'initials') !== false)
                                                    <img class="h-12 w-12 rounded-full"
                                                         src="{{ $ad->user->avatarUpload . '.svg' }}"
                                                         alt="Profile Picture of {{ $ad->user->firstname . $ad->user->lastname }}"/>
                                                @else
                                                    <img class="h-12 w-12 rounded-full"
                                                         srcset="
                 @foreach($ad->user->avatarUpload as $imagePath)
                                                         {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                 @endforeach "
                                                         src="{{ asset('storage/' . $ad->user->avatarUpload[0]) }}"
                                                         alt="Profile Picture of {{ $ad->user->firstname . $ad->user->lastname }}"/>
                                                @endif
                                            </div>
                                            <div class="flex justify-between flex-col w-full gap-2">

                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <div class="flex text-sm">
                                                            <p class="text-indigo-600 text-xl font-medium">{{ $ad->title }}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="flex md:grid md:grid-cols-100px gap-6 sm:gap-2 ">
                                                    <div
                                                        class="mt-2 gap-1 flex items-center text-sm text-indigo-500 sm:mt-0">
                                                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path
                                                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"></path>
                                                        </svg>
                                                        <p class="flex items-center text-sm text-gray-500 sm:mt-0">
                                                            {{ $ad->user->firstname . ' ' . $ad->user->lastname }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="mt-2 gap-1 flex items-center text-sm text-indigo-500 sm:mt-0">
                                                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                                  d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                                                        </svg>
                                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 gap-1">
                                                            {{ $ad->region['name'] }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col px-4 py-4 sm:px-6 flex gap-4">
                                            <p class="text-gray-500">{{ $ad->small_description }}</p>
                                        </div>

                                        @include('components.badge')
                                        <div class="flex px-4 py-4 sm:px-6">

                                            <svg class="w-4" fill="bg-gray-500" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                      d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                            </svg>
                                            <p class="ml-2 text-gray-500 text-sm">Posted {{ $ad->formattedCreatedAt }}
                                                ago</p>

                                        </div>
                                    </section>
                                </div>
                            @endforeach
                        </div>
                        <div class="max-h-screen overflow-y-hidden sm:overflow-y-auto lg:col-start-2 md:col-span-3">
                            @foreach($ads as $ad)
                                <div x-cloak x-show="selectedPreview === {{ $ad->id }}">

                                    <section id="content-of-ad-{{ $ad->id }}"
                                             class="m-px overflow-y-scroll sm:overflow-hidden bottom-0 z-10 bg-white shadow sm:rounded-md block overflow-hidden">
                                        <div class="bg-white px-4 py-5 sm:px-6">

                                            <svg x-data="{ isHidden: window.innerWidth > 768 }" x-bind:hidden="isHidden"
                                                 class="cursor-pointer w-6 icon-back mb-8" id="icon-back-1"
                                                 fill="currentColor"
                                                 viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                      d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"></path>
                                            </svg>

                                            <div class="max-w-screen-lg mx-auto relative">
                                                <div class="flex justify-between ">
                                                    <h3 class="text-2xl font-semibold mb-4">{{ $ad->title }}</h3>

                                                    <livewire:report-ad :ad="$ad"/>

                                                </div>
                                                <div class="flex flex-wrap mb-4">
                                                    <div class="w-full md:w-1/3 mt-2">
                                                        <p class="font-semibold">Location:</p>
                                                        <p class="text-gray-700">{{ $ad->region['name'] }}</p>
                                                    </div>
                                                    <div class="w-full md:w-1/3 mt-2">
                                                        <p class="font-semibold">Timeline:</p>
                                                        <p class="text-gray-700">{{ $ad->formattedStartedAt }}</p>
                                                    </div>
                                                    <div class="w-full md:w-1/3 mt-2">
                                                        <p class="font-semibold">Budget:</p>
                                                        <p class="text-gray-700">{{ floatval($ad->budget) }} €</p>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <p class="font-semibold">Job Description:</p>
                                                    <p class="text-gray-700 leading-normal">{{ $ad->description }}</p>
                                                </div>
                                                <div class="mb-4 flex justify-between">
                                                    <div class="flex items-end">
                                                        <svg class="w-4 relative -top-0.5" fill="bg-gray-500"
                                                             viewBox="0 0 20 20"
                                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                                        </svg>
                                                        <p class="ml-2 text-gray-500 text-sm">
                                                            Posted {{ $ad->formattedCreatedAt }} ago <span>&bull;  {{ $ad->employees }} candidats</span>
                                                        </p>
                                                    </div>
                                                    <a href="{{route('ads.show')}}">
                                                        <x-button kind="primary">Chat now</x-button>
                                                    </a>
                                                </div>
                                            </div>
                                            @if($ad->user->hasRole(1))
                                                <div class="max-w-screen-lg mx-auto relative border-t-2 pt-6 mt-12">
                                                    <div class="flex justify-between ">

                                                        <p class="text-2xl font-semibold mb-4">Info sur l'entreprise</p>

                                                    </div>
                                                    <div class="flex gap-2 align-middle items-center">
                                                        @if(!is_array($ad->user->avatarUpload) && strpos($ad->user->avatarUpload, 'initials') !== false)
                                                            <img class="h-12 w-12 rounded-full"
                                                                 src="{{ $ad->user->avatarUpload . '.svg' }}"
                                                                 alt="Profile Picture of {{ $ad->user->firstname . $ad->user->lastname }}"/>
                                                        @else
                                                            <img class="h-12 w-12 rounded-full"
                                                                 srcset="
                 @foreach($ad->user->avatarUpload as $imagePath)
                                                                 {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                 @endforeach "
                                                                 src="{{ asset('storage/' . $ad->user->avatarUpload[0]) }}"
                                                                 alt="Profile Picture of {{ $ad->user->firstname . $ad->user->lastname }}"/>
                                                        @endif
                                                        <span
                                                            class="text-gray-700 leading-normal">{{ $ad->user->username }}</span>
                                                    </div>
                                                    <div class="flex flex-col flex-wrap mb-4">
                                                        <div class="mb-4 mt-4">
                                                            <p class="text-gray-700 leading-normal">{{ $ad->user->about }}</p>
                                                        </div>
                                                        <div class="mb-4 flex justify-between">
                                                            <div class="flex items-end">
                                                                <svg class="w-4 relative -top-0.5" fill="bg-gray-500"
                                                                     viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     aria-hidden="true">
                                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                                          d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                                                </svg>
                                                                <p class="ml-2 text-gray-500 text-sm">
                                                                    Posted {{ $ad->formattedCreatedAt }} ago <span>&bull; 5-10 employees</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </section>

                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-sm text-gray-500">No ads found.</p>
                @endif
            </section>
        </div>
    </section>
@endsection

