@extends('layouts.layout')
@section('title', 'Homepage')
@section('description', 'Looking for independent workers or small businesses to help with your next project? Workerz connects clients with skilled independent workers and makes it easy to browse services and products. Sign up today!')
@section('keywords', 'independent workers, small businesses, services, products, clients, skilled, sign up, sign in')

@section('content')
    <section>
        <div class="pt-10 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden bg-gray-900">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div
                        class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                        <div class="lg:py-24">
                            <a href="{{route('sign-in')}}"
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
                            <div class="mt-10 sm:mt-12">
                                <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                                    <div class="sm:flex">
                                        <div class="min-w-0 flex-1">
                                            <label for="name" class="sr-only text-black">Workerz name</label>
                                            <input id="name" type="text"
                                                   placeholder="Enter the job title you need help with"
                                                   class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
                                        </div>
                                        <div class="mt-3 sm:mt-0 sm:ml-3">
                                            <x-button type="submit" class="h-full" kind="primary">Search</x-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 -mb-16 lg:m-0 lg:relative">
                        <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                            <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                            <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                 src="{{asset('img/home.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find Your Match Today</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Discover a diverse range of independent
                        workers and job opportunities in just a few clicks. Our platform simplifies the search process,
                        so
                        you can quickly find the perfect match for your needs.</p>
                </div>
                <div>
                    <div class="block" id="tabs-section">
                        <nav class="flex space-x-4 p-4 justify-center" aria-label="Tabs">
                            <!-- Add an "id" attribute to each tab link to match with their corresponding tab content section "id" attribute -->
                            <a href="{{route('workers')}}" data-tab="workers" aria-current="page"
                               class="tab-link text-white px-3 py-2 font-medium text-sm rounded-md border">Workers</a>
                            <a href="{{route('ads')}}" data-tab="ads"
                               class="tab-link text-gray-600 px-3 py-2 font-medium text-sm rounded-md border">Ads</a>
                        </nav>

                    </div>
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
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4 ">
            <section>
                <h3 style="z-index: -10" class="text-transparent absolute">Most popular workers</h3>
                <div id="workers-section" class="section-tab-content hidden flex md:grid md:grid-cols-500px flex-col gap-4">
                    @include('components.worker')

                </div>
            </section>

            <section id="ads-section"
                     class="section-tab-content max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4 hidden">
                <h3 style="z-index: -10" class="text-transparent absolute">Most popular ads</h3>
                @include('components.ad')

            </section>

        </div>

        <!-- CTA Section -->
        @include('layouts.cta')
    </section>

@endsection

@section('scripts')
    @vite('resources/js/filters.js')
    @vite('resources/js/sharing-reporting.js')

    <script>

        // Get all tab links
        const tabLinks = document.querySelectorAll('.tab-link');

        // Loop through each tab link and add a click event listener
        tabLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                // Get the data-tab attribute value of the clicked link
                const tabId = link.getAttribute('data-tab');

                // Hide all tab content sections
                const tabContentSections = document.querySelectorAll('.section-tab-content');
                tabContentSections.forEach(section => {
                    section.classList.add('hidden');
                    section.classList.remove('md:grid');
                    section.classList.remove('md:grid-cols-500px');
                });

                // Show the corresponding tab content section for the clicked link
                const tabContentSection = document.getElementById(tabId + '-section');
                tabContentSection.classList.remove('hidden');
                if (tabId === "workers") {
                    tabContentSection.classList.add('md:grid');
                    tabContentSection.classList.add('md:grid-cols-500px');
                }

                // Set the current tab link as active
                tabLinks.forEach(tabLink => {
                    tabLink.setAttribute('aria-current', 'false');
                    tabLink.classList.remove('bg-purple-600', 'text-white');
                    tabLink.classList.add('text-gray-600');
                });
                link.setAttribute('aria-current', 'page');
                link.classList.add('bg-purple-600', 'text-white');
                link.classList.remove('text-gray-600');

                // Store the id of the active tab in local storage
                localStorage.setItem('activeTab', tabId);
            });
        });

        // Set the first tab as active by default
        const firstTabLink = tabLinks[0];
        firstTabLink.setAttribute('aria-current', 'page');
        firstTabLink.classList.add('bg-purple-600');
        const firstTabId = firstTabLink.dataset.tab;
        const firstTabContentSection = document.getElementById(firstTabId + '-section');
        firstTabContentSection.classList.remove('hidden');

        // Retrieve the id of the active tab from local storage and set it as active
        const activeTabId = localStorage.getItem('activeTab');
        if (activeTabId && activeTabId !== "workers") {
            const activeTabLink = document.querySelector(`[data-tab="${activeTabId}"]`);
            if (activeTabLink) {
                activeTabLink.click();
            }
        }

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

