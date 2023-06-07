@extends('layouts.layout')
@section('title', 'Browse Ads')
@section('description', 'Browse all the latest ads posted on Workerz. Find the best freelancers for your project needs.')
@section('keywords', 'Browse Ads, Freelancers, Projects, Services, Workerz')

@section('content')

    <section>
        <section class="bg-gray-50">
            <div class="background_blur hidden fixed inset-0 flex z-40 sm:hidden" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
                <div
                    class="dialog-container hidden ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
                    <div class="px-4 flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button type="button"
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
                            <h3 class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse question button -->
                                <button type="button"
                                        class="button_filter_category px-2 py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Category </span>
                                    <span class="ml-6 flex items-center">
                                    <svg class="chevron_category rotate-0 h-5 w-5 transform"
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
                            <div class="content_filter_category pt-6 hidden" id="filter-section-0">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-0" name="category[]" value="tees"
                                               type="checkbox"
                                               class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-mobile-category-0" class="ml-3 text-sm text-gray-500"> Tees
                                            (31)</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-1" name="category[]" value="crewnecks"
                                               type="checkbox"
                                               class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-mobile-category-1" class="ml-3 text-sm text-gray-500">
                                            Crewnecks
                                            (31) </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-2" name="category[]" value="hats"
                                               type="checkbox"
                                               class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-mobile-category-2" class="ml-3 text-sm text-gray-500"> Hats
                                            (31) </label>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="border-t border-gray-200 px-4 py-6">
                            <h3 class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse question button -->
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
                            <div class="content_filter_regions pt-6 hidden" id="filter-section-1">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-brand-0" name="brand[]" value="clothing-company"
                                               type="checkbox"
                                               class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-mobile-brand-0" class="ml-3 text-sm text-gray-500"> Clothing
                                            Company </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-brand-1" name="brand[]" value="fashion-inc"
                                               type="checkbox"
                                               class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-mobile-brand-1" class="ml-3 text-sm text-gray-500"> Fashion
                                            Inc. </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-brand-2" name="brand[]" value="shoes-n-more"
                                               type="checkbox"
                                               class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-mobile-brand-2" class="ml-3 text-sm text-gray-500"> Shoes
                                            &#039;n
                                            More </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>

            <section class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="py-16">
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find the Right Job Today</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Explore a wide range of job opportunities posted by
                        people and businesses in your area. Our platform makes it easy to discover and apply for jobs that match your
                        skills and interests.</p>
                </div>


                <section aria-labelledby="filter-heading" class="border-t border-gray-200 py-6">
                    <h3 id="filter-heading" class="sr-only">Product filters</h3>

                    <div class="flex items-center justify-between">
                        <div class="relative z-10 inline-block text-left">
                            <div>
                                <button type="button"
                                        class="filter_sort group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                                    Sort
                                    <!-- Heroicon name: solid/chevron-down -->
                                    <svg
                                        class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div
                                class="filter_sort_content hidden origin-top-left absolute left-0 z-10 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
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
                        </div>

                        <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                        <button type="button"
                                class="button_filters_mobile_open inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">
                            Filters
                        </button>

                        <div class="hidden sm:flex sm:items-baseline sm:space-x-8">
                            <div id="desktop-menu" class="relative z-10 inline-block text-left">
                                <div class="filter_sort">
                                    <button type="button"
                                            class="filter_category group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                            aria-expanded="false">
                                        <span>Category</span>

                                        <span
                                            class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums">1</span>
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg
                                            class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                                <div
                                    class="filter_content_category hidden origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <form class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-category-0" name="category[]" value="tees" type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-0"
                                                   class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Tees (31) </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-1" name="category[]" value="crewnecks"
                                                   type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-1"
                                                   class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Crewnecks (31) </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-2" name="category[]" value="hats" type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-2"
                                                   class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Hats (31) </label>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="desktop-menu" class="relative z-10 inline-block text-left">
                                <div>
                                    <button type="button"
                                            class="filter_regions group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                            aria-expanded="false">
                                        <span>Regions</span>
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg
                                            class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>

                                <!--
                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div
                                    class="filter_content_regions hidden origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <form class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-brand-0" name="brand[]" value="clothing-company"
                                                   type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-brand-0"
                                                   class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Clothing Company </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-brand-1" name="brand[]" value="fashion-inc"
                                                   type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-brand-1"
                                                   class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Fashion Inc. </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-brand-2" name="brand[]" value="shoes-n-more"
                                                   type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-brand-2"
                                                   class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Shoes &#039;n More </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <div class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4 ">
            <p class="text-xs">Environ 148 000 résultats</p>

            <section id="ads-section" role="list"
                     class="relative mt-2 max-w-3xl mx-auto grid grid-cols-1 gap-2 md:max-w-7xl md:grid-flow-col-dense md:grid-cols-3">
                <h3 style="z-index: -10" class="text-transparent absolute">Most popular ads</h3>
                <div
                    class="max-h-screen overflow-y-hidden sm:overflow-y-auto space-y-6 md:col-start-1 sm:overflow-hidden p-1">
                    <div id="title-of-ad-1"
                         class="cursor-pointer title-of-ad bg-white shadow sm:rounded-md block overflow-hidden hover:bg-indigo-50">

                        <div class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 md:grid-cols-1 lg:grid-cols-48-1">

                            <div class="flex-shrink-0 self-center">
                                <img class="h-12 w-12 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </div>
                            <div class="flex justify-between flex-col w-full gap-2">

                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="flex text-sm">
                                            <h4 class="text-indigo-600 text-xl font-medium">Need help painting a
                                                room</h4>
                                        </div>
                                    </div>

                                </div>

                                <div class="flex md:grid md:grid-cols-100px gap-6 sm:gap-2 ">
                                    <div class="mt-2 gap-1 flex items-center text-sm text-indigo-500 sm:mt-0">
                                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path
                                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"></path>
                                        </svg>
                                        <p class="flex items-center text-sm text-gray-500 sm:mt-0">
                                            Michael Vento
                                        </p>
                                    </div>
                                    <div class="mt-2 gap-1 flex items-center text-sm text-indigo-500 sm:mt-0">
                                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                  d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                                        </svg>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 gap-1">
                                            <!-- Heroicon name: solid/location-marker -->
                                            Liège
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col px-4 py-4 sm:px-6 flex gap-4">
                            <p class="text-gray-500">I need some help painting a room in my home. The room is
                                approximately 12' x 12' and the walls are currently white. I would like to
                                change the color to a light blue.</p>
                        </div>
                        <div class="flex px-4 py-4 sm:px-6">
                            <svg class="w-4" fill="bg-gray-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                 aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                      d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                            </svg>
                            <p class="ml-2 text-gray-500 text-sm">Posted 2 days ago</p>
                        </div>
                    </div>
                </div>
                <div class="max-h-screen overflow-y-hidden sm:overflow-y-auto lg:col-start-2 md:col-span-3">

                    <section id="content-of-ad-1" aria-labelledby="timeline-title"
                             class="m-px hidden overflow-y-scroll sm:overflow-hidden bottom-0 z-10 bg-white shadow sm:rounded-md block overflow-hidden">
                        <div class="bg-white px-4 py-5 sm:px-6">

                            <svg class="cursor-pointer w-6 icon-back mb-8" id="icon-back-1" fill="currentColor"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                      d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"></path>
                            </svg>

                            <div class="max-w-screen-lg mx-auto">
                                <div class="flex justify-between">
                                    <h3 class="text-2xl font-semibold mb-4">Mason for Wall Building</h3>
                                    <div class="flex gap-2 items-start">
                                        <a href="">
                                            <svg fill="none" class="w-6" stroke="currentColor" stroke-width="1.5"
                                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"></path>
                                            </svg>
                                        </a>
                                        <form action="" id="saveWorker-1">
                                            <button type="submit">
                                                <svg fill="none" class="w-6" stroke="currentColor" stroke-width="1.5"
                                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                     aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        <a href="">
                                            <svg fill="none" class="w-6" stroke="currentColor" stroke-width="1.5"
                                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-4">
                                    <div class="w-full md:w-1/3">
                                        <p class="text-gray-700">Location:</p>
                                        <p class="font-semibold">City, State</p>
                                    </div>
                                    <div class="w-full md:w-1/3">
                                        <p class="text-gray-700">Timeline:</p>
                                        <p class="font-semibold">Start and end dates</p>
                                    </div>
                                    <div class="w-full md:w-1/3">
                                        <p class="text-gray-700">Budget:</p>
                                        <p class="font-semibold">$X</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="text-gray-700 mb-2">Job Description:</p>
                                    <p class="text-gray-700 leading-normal">Looking for a skilled mason to build a brick
                                        wall in the middle of a room. The wall should be X feet wide and Y feet high,
                                        and must be built with [specific material]. Experience in [specific type of wall
                                        building] is required.</p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-gray-700 mb-2">Requirements:</p>
                                    <ul class="list-disc list-inside">
                                        <li class="text-gray-700 leading-normal">Minimum of [number] years of experience
                                            in masonry
                                        </li>
                                        <li class="text-gray-700 leading-normal">Ability to work with [specific
                                            materials]
                                        </li>
                                        <li class="text-gray-700 leading-normal">Attention to detail and ability to
                                            follow instructions
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-4 flex justify-between">
                                    <div class="flex items-end">
                                        <svg class="w-4" fill="bg-gray-500" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                        </svg>
                                        <p class="ml-2 text-gray-500 text-sm">Posted 2 days ago</p>
                                    </div>
                                    <a href="{{route('ads.show')}}">
                                        <x-button kind="primary">Chat now</x-button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </section>

                </div>
            </section>
        </div>
    </section>
@endsection
@section('scripts')
    @vite('resources/js/filters.js')

    <script>
        // Get all elements with the class 'title-of-ad'
        const titles = document.querySelectorAll('[id^="title-of-ad-"]');
        const firstTitle = titles[0];
        const contents = document.querySelectorAll('[id^="content-of-ad-"]');
        const firstContent = contents[0];
        const firstContentSection = document.querySelectorAll('[id^="content-of-ad-"]');
        const icons = document.querySelectorAll('[id^="icon-back-"]');
        const screenWidth = window.innerWidth;

        if (screenWidth < 768) {
            contents.forEach(content => {
                content.classList.add('hidden', 'fixed', 'top-0', 'left-0', 'w-full')
            })
        } else {
            firstTitle.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500', 'bg-indigo-50');
            firstContent.classList.remove('hidden');
        }
        // Loop through each title and add a click event listener
        // Loop through each title and add a click event listener
        titles.forEach(title => {
            title.addEventListener('click', () => {
                const id = title.getAttribute('id').replace('title', 'content');
                const contentSection = document.getElementById(id);

                // Remove 'border-indigo-500', 'ring-2', and 'ring-indigo-500' from all titles
                titles.forEach(t => {
                    t.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500', 'bg-indigo-50', 'bg-white');
                });

                if (screenWidth > 768) {
                    title.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500', 'bg-indigo-50');
                }

                // Add 'border-indigo-500', 'ring-2', and 'ring-indigo-500' to the clicked title
                title.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500', 'bg-indigo-50');

                // Hide all 'content-of-ad' sections
                const contentSections = document.querySelectorAll('[id^="content-of-ad-"]');
                contentSections.forEach(section => {
                    section.classList.add('hidden');
                });

                if (screenWidth < 768) {
                    document.body.classList.add('overflow-hidden');
                }

                // Show the corresponding 'content-of-ad' section for the clicked title
                contentSection.classList.remove('hidden');

                // Set the current tab link as active
                tabLinks.forEach(tabLink => {
                    tabLink.setAttribute('aria-current', 'false');
                    tabLink.classList.remove('bg-purple-600', 'text-white');
                    tabLink.classList.add('text-gray-600');
                });

                if (id.includes('worker')) {
                    const workersTab = document.querySelector('[data-tab="workers"]');
                    workersTab.setAttribute('aria-current', 'page');
                    workersTab.classList.add('bg-purple-600', 'text-white');
                    workersTab.classList.remove('text-gray-600');
                } else if (id.includes('ad')) {
                    const adsTab = document.querySelector('[data-tab="ads"]');
                    adsTab.setAttribute('aria-current', 'page');
                    adsTab.classList.add('bg-purple-600', 'text-white');
                    adsTab.classList.remove('text-gray-600');
                }
            });
        });


        // Loop through each 'icon-back' element and add a click event listener
        icons.forEach(icon => {
            icon.addEventListener('click', () => {
                const id = icon.getAttribute('id').replace('icon-back-', '');
                const contentSection = document.getElementById(`content-of-ad-${id}`);
                contentSection.classList.add('hidden');
                document.body.classList.remove('overflow-hidden')
            });
            if (screenWidth > 768) {
                icon.classList.add('hidden');
            }

        });
    </script>
@endsection
