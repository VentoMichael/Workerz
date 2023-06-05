@extends('layouts.layout')
@section('title', 'Browse Talented Freelancers')
@section('description', 'Discover talented freelancers on our platform. Browse through their skills, portfolio, and reviews from other clients. Hire the right person for your project today.')
@section('keywords', ' freelancers, skills, portfolio, reviews, hire')

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
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find the Right Worker for Your Needs</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Looking for a skilled and reliable worker for your project? Our platform connects you with a diverse range of independent professionals who are ready to get the job done. With just a few clicks, you can find the perfect match for your needs and get started on your project right away.</p>
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
        <section>
            <h3 style="z-index: -10" class="text-transparent absolute">Most popular workers</h3>
            <div id="workers-section" role="list" class="hidden flex md:grid md:grid-cols-500px flex-col gap-4">
                <section class="bg-white shadow overflow-hidden sm:rounded-md relative">
                    <div class="top-5 absolute right-6">
                        <form action="" id="saveWorker">
                            <button type="submit" class="flex bg-white shadow overflow-hidden sm:rounded-md p-1.5">
                                <svg fill="none" class="w-7" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <a href="{{route('workers.show')}}" class="block hover:bg-indigo-50">
                        <div class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 sm:grid-cols-48-1">

                            <div class="flex-shrink-0 self-center">
                                <img class="h-12 w-12 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </div>
                            <div class="flex justify-between flex-col w-full">

                                <div class="flex items-center justify-between">
                                    <div>

                                        <div class="flex text-sm sm:items-end flex-col sm:flex-row">
                                            <h4 class="text-xl font-medium text-indigo-600 truncate">Sales Executive</h4>
                                            <p class="sm:ml-1 flex-shrink-0 text-md font-normal text-gray-500">in Business
                                                Development</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="flex gap-6 sm:mt-2">
                                    <div class="mt-2 gap-1 flex flex-col sm:flex-row sm:items-center text-sm text-indigo-500 sm:mt-0">
                                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path
                                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"></path>
                                        </svg>
                                        <p class="flex items-center text-sm text-gray-500 sm:mt-0">
                                            John Doe | ABC Inc.
                                        </p>
                                    </div>
                                    <div class="mt-2 gap-1 flex flex-col sm:flex-row sm:items-center text-sm text-indigo-500 sm:mt-0">
                                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                  d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                                        </svg>
                                        <p class="flex items-center text-sm text-gray-500 sm:mt-0 gap-1">
                                            <!-- Heroicon name: solid/location-marker -->
                                            New York City, USA
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col px-4 py-4 sm:px-6 flex gap-4">
                            <p class="text-gray-500">responsible for identifying new business opportunities, building
                                relationships with clients, and closing deals to drive revenue growth for ABC Inc. He
                                has a strong track record of success in sales and customer service, and is passionate
                                about helping his clients achieve their goals. John is a skilled communicator and
                                problem solver, and works closely with his team to develop creative solutions to complex
                                challenges.</p>
                        </div>
                    </a>
                </section>
            </div>
        </section>

                </div>
    </section>
@endsection

