<header>
    <div class="relative bg-white">
        <div
            class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{route('home')}}">
                    <span class="sr-only">Workerz</span>
                    {!! file_get_contents(asset('img/logo.svg')) !!}
                </a>
            </div>
            <!-- Main modal -->
            @include('components.authentication-modal')

            <div class="-mr-2 -my-2 md:hidden">
                <button type="button"
                        class="button-menu_open bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            <nav class="hidden md:flex space-x-10">
                <x-nav-link kind="primary" href="{{ route('ads') }}" class="{{ Route::currentRouteName() === 'ads' || Route::currentRouteName() === 'ads.show' ? 'font-extrabold text-purple-700' : '' }}">
                    Ads
                </x-nav-link>
                <x-nav-link kind="primary" href="{{ route('workers') }}" class="{{ Route::currentRouteName() === 'workers' || Route::currentRouteName() === 'workers.show' ? 'font-extrabold text-purple-700' : '' }}">
                    Workers
                </x-nav-link>
                <x-nav-link kind="primary" href="{{ route('contact-us') }}" class="{{ Route::currentRouteName() === 'contact-us' ? 'font-extrabold text-purple-700' : '' }}">
                    Contact
                </x-nav-link>
                <x-nav-link kind="primary" href="{{ route('about-us') }}" class="{{ Route::currentRouteName() === 'about-us'  ? 'font-extrabold text-purple-700' : '' }}">About us</x-nav-link>

            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 gap-4">
                <x-nav-link kind="primary" id="signin-link" href="{{ route('sign-in') }}" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="{{ Route::currentRouteName() === 'sign-in' ? 'font-extrabold text-purple-700' : '' }}">Sign in</x-nav-link>

                <a href="{{route('sign-up.role')}}">
                    <x-button kind="primary">Sign up</x-button>
                </a>
            </div>
        </div>

        <div class="nav_open hidden absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex items-center justify-between">
                        <div>
                            {!! file_get_contents(asset('img/logo.svg')) !!}
                        </div>
                        <div class="-mr-2">
                            <button type="button"
                                    class="button-menu_close bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <nav class="grid grid-cols-1 gap-7">
                            <a href="{{ route('ads') }}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                                    <!-- Heroicon name: outline/inbox -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                </div>
                                <span class="ml-4 text-base font-medium text-gray-900">Ads</span>
                            </a>

                            <a href="{{ route('workers') }}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                    </svg>
                                </div>
                                <span class="ml-4 text-base font-medium text-gray-900">Workers</span>
                            </a>

                            <a href="{{ route('contact-us') }}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                                    <!-- Heroicon name: outline/chat-alt-2 -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                    </svg>
                                </div>
                                <span class="ml-4 text-base font-medium text-gray-900">Contact</span>
                            </a>

                            <a href="{{ route('about-us') }}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                                    <!-- Heroicon name: outline/question-mark-circle -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="ml-4 text-base font-medium text-gray-900">About us</span>
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="py-6 px-5">
                    <div class="mt-6">
                        <a href="{{ route('sign-up.role') }}"
                           class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                            Sign up </a>
                        <p class="mt-6 text-center text-base font-medium text-gray-500">
                            Existing customer?
                            <x-nav-link kind="primary" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-indigo-500" href="{{ route('sign-in') }}">Sign in</x-nav-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
