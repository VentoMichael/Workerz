<div>
    <div class="bg-gray-50"
         x-data="{ openFilterMobile:false, openFilter: false, openCategory: false, openRegions: false }">
        <div x-show="openFilterMobile" x-cloak @click.away="openFilterMobile = false"
             class="fixed inset-0 flex z-40 sm:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
            <div
                class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
                <div class="px-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900">Filters
                    </h2>
                    <button @click="openFilterMobile = false" type="button"
                            class="button_filter_mobile -mr-2 sm:mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form class="mt-4">
                    <div class="border-t border-gray-200 px-4 py-6">
                        <p @click="openCategory = !openCategory" class="-mx-2 -my-3 flow-root">
                            <button type="button"
                                    class="button_filter_category px-2 py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                    aria-controls="filter-section-0" aria-expanded="false">
                                <span class="font-medium text-gray-900"> Category
                                @if($selectedCategoryCount)
                                        <span
                                            class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-purple-600 tabular-nums">{{ $selectedCategoryCount }}</span>
                                    @endif
                                </span>
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
                        </p>
                        <div x-show="openCategory" class="content_filter_category pt-6" id="filter-section-0">
                            <div class="space-y-6">

                                <fieldset>

                                    <legend class="sr-only">Category

                                    </legend>
                                    @foreach($adSkillsWithCount as $category => $count)
                                        <div class="flex items-center mt-0">
                                            <input wire:click="updFilters" wire:model="selectedCategories"
                                                   id="filter-mobile-ad-category-{{ $loop->index }}" name="category[]"
                                                   value="{{ $category }}"
                                                   type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-ad-category-{{ $loop->index }}"
                                                   class="ml-3 text-sm font-medium text-gray-700">
                                                {{ $category }} ({{ $count }})</label>
                                        </div>
                                    @endforeach

                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-4 py-6">
                        <p @click="openRegions = !openRegions" class="-mx-2 -my-3 flow-root">
                            <button type="button"
                                    class="filter_region px-2 py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                    aria-controls="filter-section-1" aria-expanded="false">
                                <span class="font-medium text-gray-900"> Region
                                    @if($selectedRegionCount)
                                        <span
                                            class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-purple-600 tabular-nums">{{ $selectedRegionCount }}</span>
                                    @endif
                                </span>
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
                        </p>
                        <div x-show="openRegions" class="content_filter_regions pt-6" id="filter-section-1">
                            <div class="space-y-6">
                                <fieldset>

                                    <legend class="sr-only">Region
                                    </legend>
                                    @foreach($adRegionsWithCount as $region => $count)
                                        <div class="flex items-center mt-0">
                                            <input wire:click="updFilters" wire:model="selectedRegions"
                                                   id="filter-mobile-ad-region-{{ $loop->index }}" name="region[]"
                                                   value="{{$region}}"
                                                   type="checkbox"
                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-ad-region-{{ $loop->index }}"
                                                   class="ml-3 text-sm font-medium text-gray-700">
                                                {{ $region }} ({{ $count }})</label>
                                        </div>
                                    @endforeach

                                </fieldset>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <section class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8">
            @if($notHome)
                <div class="py-16">
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Find the right job today</h2>
                    <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">Explore a wide range of job opportunities
                        posted by
                        people and businesses in your area. Our platform makes it easy to discover and apply for jobs
                        that match your
                        skills and interests.</p>
                </div>

            @endif
            <div aria-labelledby="filter-heading" class="border-t border-gray-200 py-6">
                <p id="filter-heading" class="sr-only">Product filters</p>

                <div
                    x-data="{ isFixed: false, divOffset: null, openFilter: false, openCategory: false, openRegions: false }"
                    x-init="divOffset = $el.offsetTop, divHeight = $el.offsetHeight"
                    x-on:scroll.window="isFixed = (window.scrollY >= divOffset - divHeight)"
                    x-bind:class="{ 'fixed py-6 top-0 px-4 sm:px-6 left-0 w-full z-20 bg-gray-50': isFixed && window.innerWidth <= 1024 }"
                    class="flex items-center justify-between">
                    <div class=" relative z-10 inline-block text-left">
                        <div>

                            <button @click="openFilter = !openFilter" type="button"
                                    class="filter_sort group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort

                                @if($sortingOption === 'newest')
                                    <span
                                        class="ml-1.5 rounded py-1 px-1 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums">
                                        <svg class="w-3 h-3 text-purple-600" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M5 1v12m0 0 4-4m-4 4L1 9"/>
                                        </svg>
                                    </span>
                                @else
                                    <span
                                        class="ml-1.5 rounded py-1 px-1 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums">
                                    <svg class="w-3 h-3 text-purple-600" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M1 7h9.231M1 11h9.231M13 2.086A5.95 5.95 0 0 0 9.615 1C5.877 1 2.846 4.582 2.846 9s3.031 8 6.769 8A5.94 5.94 0 0 0 13 15.916"/>
                                    </svg>
                                    </span>
                                @endif
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
                                    <a wire:click="updFilters('cheaper')"
                                       class="cursor-pointer hover:bg-purple-50 @if($sortingOption === 'cheaper') bg-purple-50 @endif block px-4 py-2 text-sm font-medium text-gray-700"
                                       role="menuitem"
                                       tabindex="-1" id="mobile-menu-item-0"> Cheaper </a>

                                    <a wire:click="updFilters('newest')"
                                       class="cursor-pointer hover:bg-purple-50 @if($sortingOption === 'newest') bg-purple-50 @endif block px-4 py-2 text-sm font-medium text-gray-700"
                                       role="menuitem"
                                       tabindex="-1" id="mobile-menu-item-2"> Newest </a>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                    <button @click="openFilterMobile = true" type="button"
                            class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">
                        Filters @if($selectedCategoryCount || $selectedRegionCount)
                            <span
                                class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-purple-600 tabular-nums">{{ $selectedCategoryCount + $selectedRegionCount }}</span>
                        @endif
                    </button>

                    <div x-data="{ openCategory: false, openRegions: false }"
                         class="sm:flex hidden sm:items-baseline sm:space-x-8">
                        <div id="desktop-menu" class="relative z-10 inline-block text-left">
                            <div class="filter_sort">
                                <button @click="openCategory = !openCategory"
                                        type="button"
                                        class="filter_category group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        aria-expanded="false">
                                    <span>Category</span>

                                    @if($selectedCategoryCount)
                                        <span
                                            class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-purple-600 tabular-nums">{{ $selectedCategoryCount }}</span>
                                    @endif
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
                                                <input wire:click="updFilters" wire:model="selectedCategories"
                                                       id="filter-category-ad-{{ $loop->index }}" name="category[]"
                                                       value="{{ $category }}"
                                                       type="checkbox"
                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-category-ad-{{ $loop->index }}"
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
                                <button @click="openRegions = !openRegions"
                                        type="button"
                                        class="filter_regions group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        aria-expanded="false">
                                    <span>Regions</span>
                                    @if($selectedRegionCount)
                                        <span
                                            class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-purple-600 tabular-nums">{{ $selectedRegionCount }}</span>
                                    @endif
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
                                                <input wire:click="updFilters" wire:model="selectedRegions"
                                                       id="filter-region-ad-{{ $loop->index }}" name="region[]"
                                                       value="{{$region}}"
                                                       type="checkbox"
                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-region-ad-{{ $loop->index }}"
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
            </div>
        </section>
    </div>

    <div class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4" wire:loading.class="opacity-60">

        <section>
            <p class="text-xs mb-2">About {{ $countAds }} result{{ $countAds > 1 ? 's': '' }}</p>

            <div class="grid grid-cols-1 gap-2 md:max-w-7xl md:grid-flow-col-dense md:grid-cols-3 relative">
                @if($agent->isMobile() && !$selectedAd || $agent->isDesktop())
                    <div
                        class="sm:absolute inset-0 sm:overflow-y-auto sm:w-2/6 sm:max-h-screen overflow-y-hidden sm:overflow-y-auto space-y-6 md:col-start-1 sm:overflow-hidden p-1 sm:pr-3">
                        @if ($ads->isEmpty())
                            <p>No ads found.</p>
                        @else
                            @foreach($ads as $ad)
                                <div wire:click="showPreview({{ $ad->id }})" wire:key="{{ $ad->id }}">
                                    <section
                                        class="cursor-pointer title-of-ad shadow sm:rounded-md block overflow-visible hover:bg-indigo-50 @if($selectedAd && $ad->id === $selectedAd->id) border-indigo-500 ring-2 ring-indigo-500 bg-indigo-50 @else bg-white @endif">
                                        <div
                                            class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 md:grid-cols-1 lg:grid-cols-48-1">

                                            <div class="flex-shrink-0 self-center">
                                                @if(!is_array($image) && strpos($image, 'initials') !== false)
                                                    <img class="h-12 w-12 rounded-full"
                                                         src="{{ $image . '.svg' }}"
                                                         alt="Profile Picture of {{ $ad->user->firstname . $ad->user->lastname }}"/>
                                                @else
                                                    <img class="h-12 w-12 rounded-full"
                                                         srcset="
                             @foreach($image as $imagePath)
                                                         {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                             @endforeach "
                                                         src="{{ asset('storage/' . $image[0]) }}"
                                                         alt="Profile Picture of {{ $ad->user->firstname . $ad->user->lastname }}"/>
                                                @endif
                                            </div>
                                            <div class="flex justify-between flex-col w-full gap-2">

                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <div class="flex text-sm">
                                                            <p class="text-indigo-600 text-xl font-medium">{{ $ad['title'] }}</p>
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
                                                            {{ $ad['user']['firstname'] . ' ' . $ad['user']['lastname'] }}
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
                                                            {{ $ad['region']['name'] }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col px-4 py-4 sm:px-6 flex gap-4">
                                            <p class="text-gray-500">{{ Str::limit($ad['description'], 120) }}</p>
                                        </div>
                                        @if($ad['user']['company']['hiring'])
                                            @include('components.badge')
                                        @endif
                                        <div class="flex px-4 py-4 sm:px-6">

                                            <svg class="w-4" fill="bg-gray-500" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                      d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                            </svg>
                                            <p class="ml-2 text-gray-500 text-sm">Posted {{ $ad['formattedCreatedAt'] }}
                                                ago</p>

                                        </div>
                                    </section>
                                </div>
                            @endforeach
                        @endif
                        @if(!$ads->isEmpty())
                            {{ $ads->links('components/pagination') }}
                        @endif
                    </div>
                @endif

                @if(!$ads->isEmpty())
                    @if($selectedAd)
                        <div class="overflow-y-hidden sm:overflow-y-auto lg:col-start-2 md:col-span-3">
                            <div>

                                <section id="content-of-ad-{{ $selectedAd->id }}"
                                         class="m-px overflow-y-scroll sm:overflow-hidden bottom-0 z-10 bg-white shadow sm:rounded-md block overflow-hidden">
                                    <div class="bg-white px-4 py-5 sm:px-6">
                                        @if($agent->isMobile())
                                            <div class="flex gap-2" wire:click="closeAd">
                                                <svg class="cursor-pointer w-6 icon-back mb-8"
                                                     id="icon-back-1" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                          d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"></path>
                                                </svg>
                                                <p>
                                                    Back to the list
                                                </p>
                                            </div>
                                        @endif
                                        <div class="max-w-screen-lg mx-auto relative">
                                            <div class="flex justify-between ">
                                                <h3 class="text-2xl font-semibold mb-4">{{ $selectedAd->title }}</h3>

                                                <div class="top-5 absolute right-6 inline-block text-left"
                                                     x-data="{ isSharingOpen{{ $selectedAd->id }}: false, isReportingOpen{{ $selectedAd->id }}: false }">
                                                    <div
                                                        x-data="{ showMessage: @if($successMessage || $errorMessage) true @else false @endif }">
                                                        @if($successMessage)
                                                            <div x-show="showMessage">
                                                                @include('components.success-message', ['message' => $successMessage,'clearProperty' => 'successMessage'])
                                                            </div>
                                                        @endif

                                                        @if($errorMessage)
                                                            <div x-show="showMessage">
                                                                @include('components.error-message', ['message' => $errorMessage,'clearProperty' => 'errorMessage'])
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="flex gap-1">

                                                        <button wire:click="toggleSharing"
                                                                @click="isSharingOpen{{ $selectedAd->id }} = true"
                                                                type="button"
                                                                class="inline-flex items-center justify-center w-full px-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                id="dropdown-menu-button" aria-expanded="true"
                                                                aria-haspopup="true">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                 height="1em"
                                                                 viewBox="0 0 512 512">
                                                                <path
                                                                    d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/>
                                                            </svg>

                                                        </button>
                                                        <button @click="isReportingOpen{{ $selectedAd->id }} = true"
                                                                type="button"
                                                                class="inline-flex items-center justify-center w-full px-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                id="dropdown-menu-button" aria-expanded="true"
                                                                aria-haspopup="true">
                                                            <span class="text-2xl">...</span>
                                                        </button>
                                                    </div>
                                                    <div x-cloak x-show="isSharingOpen{{ $selectedAd->id }}"
                                                         @click.away="isSharingOpen{{ $selectedAd->id }} = false"
                                                         class="z-10 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                         role="menu" aria-orientation="vertical"
                                                         aria-labelledby="dropdown-menu-button" tabindex="-1">
                                                        <div class="py-1" role="none">
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                                               class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">
                                                                <button type="button"
                                                                        class="flex text-sm text-gray-700 items-center gap-4"
                                                                        id="dropdown-menu-button" aria-expanded="true"
                                                                        aria-haspopup="true">
                                                                    <svg fill="#000000" class="w-8 h-8" version="1.1"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         viewBox="0 0 512 512" xml:space="preserve"><g
                                                                            id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                           stroke-linecap="round"
                                                                           stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <g id="7935ec95c421cee6d86eb22ecd11b7e3">
                                                                                <path style="display: inline;"
                                                                                      d="M283.122,122.174c0,5.24,0,22.319,0,46.583h83.424l-9.045,74.367h-74.379 c0,114.688,0,268.375,0,268.375h-98.726c0,0,0-151.653,0-268.375h-51.443v-74.367h51.443c0-29.492,0-50.463,0-56.302 c0-27.82-2.096-41.02,9.725-62.578C205.948,28.32,239.308-0.174,297.007,0.512c57.713,0.711,82.04,6.263,82.04,6.263 l-12.501,79.257c0,0-36.853-9.731-54.942-6.263C293.539,83.238,283.122,94.366,283.122,122.174z"></path>
                                                                            </g>
                                                                        </g></svg>
                                                                    <span class="text-left">Partager sur Facebook</span>
                                                                </button>
                                                            </a>
                                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}"
                                                               target="_blank"
                                                               class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">
                                                                <button type="button"
                                                                        class="flex text-sm text-gray-700 items-center gap-4"
                                                                        id="dropdown-menu-button" aria-expanded="true"
                                                                        aria-haspopup="true">
                                                                    <svg viewBox="0 0 20 20" class="w-7 h-7"
                                                                         version="1.1"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         fill="#000000">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                           stroke-linecap="round"
                                                                           stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <defs></defs>
                                                                            <g id="Page-1" stroke="none"
                                                                               stroke-width="1" fill="none"
                                                                               fill-rule="evenodd">
                                                                                <g id="Dribbble-Light-Preview"
                                                                                   transform="translate(-180.000000, -7479.000000)"
                                                                                   fill="#000000">
                                                                                    <g id="icons"
                                                                                       transform="translate(56.000000, 160.000000)">
                                                                                        <path
                                                                                            d="M144,7339 L140,7339 L140,7332.001 C140,7330.081 139.153,7329.01 137.634,7329.01 C135.981,7329.01 135,7330.126 135,7332.001 L135,7339 L131,7339 L131,7326 L135,7326 L135,7327.462 C135,7327.462 136.255,7325.26 139.083,7325.26 C141.912,7325.26 144,7326.986 144,7330.558 L144,7339 L144,7339 Z M126.442,7323.921 C125.093,7323.921 124,7322.819 124,7321.46 C124,7320.102 125.093,7319 126.442,7319 C127.79,7319 128.883,7320.102 128.883,7321.46 C128.884,7322.819 127.79,7323.921 126.442,7323.921 L126.442,7323.921 Z M124,7339 L129,7339 L129,7326 L124,7326 L124,7339 Z"
                                                                                            id="linkedin-[#161]"></path>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                    <span class="text-left">Partager sur Linkedin</span>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div x-cloak x-show="isReportingOpen{{ $selectedAd->id }}"
                                                         @click.away="isReportingOpen{{ $selectedAd->id }} = false"
                                                         class="content-signal-ad-{{ $selectedAd->id }} z-10 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                         role="menu" aria-orientation="vertical"
                                                         aria-labelledby="dropdown-menu-button" tabindex="-1">
                                                        <div class="py-1" role="none">
                                                            <div x-data="{ showModal: false }">
                                                                <div wire:click="$set('reportSubmitted', true)"
                                                                     @click="showModal = !showModal"
                                                                     class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">
                                                                    <button type="button"
                                                                            class="flex text-sm text-gray-700 items-center gap-4"
                                                                            id="dropdown-menu-button"
                                                                            aria-expanded="true"
                                                                            aria-haspopup="true">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             class="w-5 h-5"
                                                                             height="1em" viewBox="0 0 448 512">
                                                                            <path
                                                                                d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32V64 368 480c0 17.7 14.3 32 32 32s32-14.3 32-32V352l64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30V66.1c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48V32z"/>
                                                                        </svg>
                                                                        <span
                                                                            class="text-left">Signaler cette annonce</span>
                                                                    </button>
                                                                </div>
                                                                @if($reportSubmitted)
                                                                    <div x-show="showModal"
                                                                         class="fixed absolute z-50"
                                                                         @click="showModal = false">
                                                                        <div
                                                                            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                                                        <div
                                                                            class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                                            <div
                                                                                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                                                <div @click.stop
                                                                                     class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:max-w-lg">
                                                                                    <div @click.stop
                                                                                         class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                                        <div @click.stop
                                                                                             class="sm:flex sm:items-start">
                                                                                            <svg
                                                                                                @click="showModal = false"
                                                                                                class="absolute cursor-pointer right-6 w-4 h-4 text-gray-800 dark:text-white"
                                                                                                aria-hidden="true"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                fill="none"
                                                                                                viewBox="0 0 14 14">
                                                                                                <path
                                                                                                    stroke="currentColor"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                                            </svg>
                                                                                            <div
                                                                                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                                                <svg
                                                                                                    class="text-blue-800 inline w-5 h-5"
                                                                                                    aria-hidden="true"
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    fill="currentColor"
                                                                                                    viewBox="0 0 20 20">
                                                                                                    <path
                                                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                                                <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                                                                    id="modal-title">
                                                                                                    Report {{$selectedAd->title}}
                                                                                                </h3>
                                                                                                <div class="mt-2">
                                                                                                    <p class="text-sm text-gray-500">
                                                                                                        Are you sure you
                                                                                                        want to report
                                                                                                        this
                                                                                                        ad? Please
                                                                                                        provide details
                                                                                                        about the issue
                                                                                                        you are
                                                                                                        reporting.</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <form
                                                                                            wire:submit.prevent="submitReport"
                                                                                            @click.stop>
                                                                                            <div class="mt-4">
                                                                                                <label for="subject"
                                                                                                       class="block text-sm font-medium text-gray-700">Subject</label>
                                                                                                <select
                                                                                                    wire:model.lazy="subject"
                                                                                                    id="subject"
                                                                                                    name="subject"
                                                                                                    class="@error('subject') border border-red-500 @enderror mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                                                                    <option wire:ignore
                                                                                                            value=""
                                                                                                            selected
                                                                                                            disabled>
                                                                                                        Choose a
                                                                                                        reporting
                                                                                                        subject
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Harassment">
                                                                                                        Harassment
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Unprofessional behavior">
                                                                                                        Unprofessional
                                                                                                        behavior
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Non-compliance with guidelines">
                                                                                                        Non-compliance
                                                                                                        with
                                                                                                        guidelines
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Security concern">
                                                                                                        Security concern
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Other">
                                                                                                        Other
                                                                                                    </option>
                                                                                                </select>
                                                                                                @error('subject')
                                                                                                <p class="text-red-500 mt-1">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                            <div class="mt-4">
                                                                                                <label for="description"
                                                                                                       class="block text-sm font-medium text-gray-700">Report
                                                                                                    Description</label>
                                                                                                <div class="mt-1">
            <textarea wire:model.lazy="description" rows="4" name="description" id="description"
                      class="@error('description')border border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                                                                                </div>
                                                                                                @error('description')
                                                                                                <p class="text-red-500 mt-1">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                            <div
                                                                                                class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 full-w mt-4 -mb-4 -mx-6">
                                                                                                <x-button type="submit"
                                                                                                          kind="primary"
                                                                                                          class="disabled:opacity-50 ml-3">
                                                                                                    Send
                                                                                                    <svg wire:loading
                                                                                                         wire:target="submitReport"
                                                                                                         aria-hidden="true"
                                                                                                         class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                                                                                                         viewBox="0 0 100 101"
                                                                                                         fill="none"
                                                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                                                        <path
                                                                                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                                                                            fill="currentColor"/>
                                                                                                        <path
                                                                                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                                                                            fill="currentFill"/>
                                                                                                    </svg>
                                                                                                </x-button>
                                                                                            </div>
                                                                                        </form>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="flex flex-wrap mb-4">
                                                <div class="w-full md:w-1/3 mt-2">
                                                    <p class="font-semibold">Location:</p>
                                                    <p class="text-gray-700">{{ $selectedAd->region['name'] }}</p>
                                                </div>
                                                <div class="w-full md:w-1/3 mt-2">
                                                    <p class="font-semibold">Timeline:</p>
                                                    <p class="text-gray-700">{{ $selectedAd->formattedStartedAt }}</p>
                                                </div>
                                                <div class="w-full md:w-1/3 mt-2">
                                                    <p class="font-semibold">Budget:</p>
                                                    <p class="text-gray-700">{{ floatval($selectedAd->budget) }} €</p>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <p class="font-semibold">Job Description:</p>
                                                <p class="text-gray-700 leading-normal">{{ $selectedAd->description }}</p>
                                            </div>
                                            <div class="mb-4 flex justify-between flex-col gap-6 sm:gap-1 sm:flex-row">
                                                <div class="flex items-end">
                                                    <svg class="w-4 relative -top-0.5" fill="bg-gray-500"
                                                         viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                              d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                                    </svg>
                                                    <p class="ml-2 text-gray-500 text-sm">
                                                        Posted {{ $selectedAd->formattedCreatedAt }} ago
                                                        <span>&bull; {{ $selectedAd->candidats }} candidats</span>
                                                    </p>
                                                </div>
                                                <a href="{{route('ads.show')}}">
                                                    <x-button kind="primary">Chat now</x-button>
                                                </a>
                                            </div>
                                        </div>
                                        @if($selectedAd->user->hasRole(1))
                                            <div class="max-w-screen-lg mx-auto relative border-t-2 pt-6 mt-12">
                                                <div class="flex justify-between ">

                                                    <p class="text-2xl font-semibold mb-4">Info sur l'entreprise</p>

                                                </div>
                                                <a href="{{ route('workers.show',['name' => $selectedAd->user->company->name]) }}"
                                                   class="flex gap-2 align-middle items-center">
                                                    @if(!is_array($image) && strpos($image, 'initials') !== false)
                                                        <img class="h-12 w-12 rounded-full"
                                                             src="{{ $image . '.svg' }}"
                                                             alt="Profile Picture of {{ $selectedAd->user->firstname . $selectedAd->user->lastname }}"/>
                                                    @else
                                                        <img class="h-12 w-12 rounded-full"
                                                             srcset="
                 @foreach($image as $imagePath)
                                                             {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                 @endforeach "
                                                             src="{{ asset('storage/' . $image[0]) }}"
                                                             alt="Profile Picture of {{ $selectedAd->user->firstname . $selectedAd->user->lastname }}"/>
                                                    @endif
                                                    <span
                                                        class="text-gray-900 leading-normal font-bold text-lg">{{ $selectedAd->user->company->name }}</span>
                                                </a>
                                                <div class="flex flex-col flex-wrap mb-4">
                                                    <div class="mb-4 mt-4">
                                                        <p class="text-gray-700 leading-normal">{{ $selectedAd->user->company->about }}</p>
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
                                                                Joined
                                                                the {{ $selectedAd->user->company->created_at->format('d/m/y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </section>

                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </section>
    </div>
</div>
