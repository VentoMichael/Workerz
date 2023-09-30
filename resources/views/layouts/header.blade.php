<header>
    @auth
        <div class="relative bg-white">
            <div
                class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-between md:space-x-10 lg:px-8">
                <div class="flex justify-start lg:w-0">
                    <a href="{{route('home')}}">
                        <span class="sr-only">Workerz</span>
                        {!! file_get_contents(asset('img/logo.svg')) !!}
                    </a>
                </div>
                <!-- Main modal -->
                <div class="-mr-2 -my-2 flex md:hidden">

                    <div class="flex md:hidden lg:relative lg:z-10 lg:ml-4 lg:items-center">
                        <button type="button"
                                class="notification-user-menu relative flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900">
                            <span class="sr-only text-black">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span
                                class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-indigo-600 border-2 border-white rounded-full -top-2 -right-2">
                            2
                        </span>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="flex-shrink-0 relative ml-4">
                            <div>
                                <button type="button"
                                        class="user-menu-button bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900"
                                        aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>

                                        @if (is_string(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) && strpos(\Illuminate\Support\Facades\Auth::user()->company->logoUpload, 'initials') !== false)
                                            <img class="w-12 h-12 rounded-full"
                                                 src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->company->logoUpload . '.svg') }}"
                                                 alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                        @else
                                            <img class="w-12 h-12 rounded-full"
                                                 srcset="
            @if (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload))
                                                 @foreach(\Illuminate\Support\Facades\Auth::user()->company->logoUpload as $imagePath)
                                                 {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                                 @endif
                                                     "
                                                 src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) ? \Illuminate\Support\Facades\Auth::user()->company->logoUpload[0] : \Illuminate\Support\Facades\Auth::user()->company->logoUpload)) }}"
                                                 alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                        @endif

                                </button>
                            </div>
                            <div
                                 class="dropdown-menu-notification hidden shadow origin-top-right absolute right-0 mt-2 w-80 rounded-md bg-white py-1 focus:outline-none"
                                 aria-orientation="vertical" tabindex="-1">
                                <a href="#">
                                    <div id="toast-message-cta"
                                         class="cursor-pointer hover:bg-indigo-100 w-full max-w-lg p-4 text-gray-500 bg-white"
                                         role="alert">
                                        <div class="flex">
                                            <img class="h-8 w-8 rounded-full"
                                                 src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                                 alt="">
                                            <div class="ml-3 text-sm font-normal">
                                                <span class="mb-1 text-sm font-semibold text-gray-900">Jese Leos</span>
                                                <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your
                                                    thoughts regarding Flowbite.
                                                </div>
                                            </div>
                                            <button type="button" id="close-modal-notification"
                                                    class="ml-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                                                    data-dismiss-target="#toast-message-cta" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div id="toast-message-cta"
                                         class="cursor-pointer hover:bg-indigo-100 w-full max-w-lg p-4 text-gray-500 bg-white"
                                         role="alert">
                                        <div class="flex">
                                            @if (is_string(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) && strpos(\Illuminate\Support\Facades\Auth::user()->company->logoUpload, 'initials') !== false)
                                                <img class="w-8 h-8 rounded-full"
                                                     src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->company->logoUpload . '.svg') }}"
                                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                            @else
                                                <img class="w-8 h-8 rounded-full"
                                                     srcset="
            @if (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload))
                                                     @foreach(\Illuminate\Support\Facades\Auth::user()->company->logoUpload as $imagePath)
                                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                                     @endif
                                                         "
                                                     src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) ? \Illuminate\Support\Facades\Auth::user()->company->logoUpload[0] : \Illuminate\Support\Facades\Auth::user()->company->logoUpload)) }}"
                                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                            @endif
                                            <div class="ml-3 text-sm font-normal">
                                                <span class="mb-1 text-sm font-semibold text-gray-900">Jese Leos</span>
                                                <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your
                                                    thoughts regarding Flowbite.
                                                </div>
                                            </div>
                                            <button type="button" id="close-modal-notification"
                                                    class="ml-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                                                    data-dismiss-target="#toast-message-cta" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div
                                 class="dropdown-menu-dashboard hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{route('dashboard.dashboard') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-0">Dashboard</a>

                                <a href="{{route('dashboard.profil')}} " class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-0">Profil</a>

                                <a href="{{ route('dashboard.settings') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-1">Settings</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" href="{{ route('logout') }}" class="text-left w-full hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-2">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="button-menu_open"
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
                <div class=" hidden md:flex lg:relative lg:z-10 lg:ml-4 lg:items-center">
                    <button type="button"
                            class="notification-user-menu relative flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900">
                        <span class="sr-only text-black">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-indigo-600 border-2 border-white rounded-full -top-2 -right-2">
                            2
                        </span>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="flex-shrink-0 relative ml-4">
                        <div>
                            <button type="button"
                                    class="user-menu-button bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900"
                                    aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                @if (is_string(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) && strpos(\Illuminate\Support\Facades\Auth::user()->company->logoUpload, 'initials') !== false)
                                    <img class="w-8 h-8 rounded-full"
                                         src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->company->logoUpload . '.svg') }}"
                                         alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                @else
                                    <img class="w-8 h-8 rounded-full"
                                         srcset="
            @if (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload))
                                         @foreach(\Illuminate\Support\Facades\Auth::user()->company->logoUpload as $imagePath)
                                         {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                         @endif
                                             "
                                         src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) ? \Illuminate\Support\Facades\Auth::user()->company->logoUpload[0] : \Illuminate\Support\Facades\Auth::user()->company->logoUpload)) }}"
                                         alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                @endif
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
                             class="dropdown-menu-notification hidden shadow origin-top-right absolute right-0 mt-2 w-80 rounded-md bg-white py-1 focus:outline-none"
                             aria-orientation="vertical" tabindex="-1">
                            <a href="#">
                                <div id="toast-message-cta"
                                     class="cursor-pointer hover:bg-indigo-100 w-full max-w-lg p-4 text-gray-500 bg-white"
                                     role="alert">
                                    <div class="flex">
                                        <img class="h-8 w-8 rounded-full"
                                             src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                             alt="">
                                        <div class="ml-3 text-sm font-normal">
                                            <span class="mb-1 text-sm font-semibold text-gray-900">Jese Leos</span>
                                            <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your
                                                thoughts regarding Flowbite.
                                            </div>
                                        </div>
                                        <button type="button" id="close-modal-notification"
                                                class="ml-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                                                data-dismiss-target="#toast-message-cta" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div id="toast-message-cta"
                                     class="cursor-pointer hover:bg-indigo-100 w-full max-w-lg p-4 text-gray-500 bg-white"
                                     role="alert">
                                    <div class="flex">
                                        <img class="h-8 w-8 rounded-full"
                                             src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                             alt="">
                                        <div class="ml-3 text-sm font-normal">
                                            <span class="mb-1 text-sm font-semibold text-gray-900">Jese Leos</span>
                                            <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your
                                                thoughts regarding Flowbite.
                                            </div>
                                        </div>
                                        <button type="button" id="close-modal-notification"
                                                class="ml-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                                                data-dismiss-target="#toast-message-cta" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div
                             class="dropdown-menu-dashboard hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{route('dashboard.dashboard') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Dashboard</a>

                            <a href="{{route('dashboard.profil')}} " class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Profil</a>

                            <a href="{{ route('dashboard.settings') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1">Settings</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit" href="{{ route('logout') }}" class="text-left w-full hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                        id="user-menu-item-2">Sign out</button>
                            </form>
                        </div>
                    </div>
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
                    <div class="notification-user-menu hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                        <button type="button"
                                class="relative flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900">
                            <span class="sr-only text-black">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span
                                class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-indigo-600 border-2 border-white rounded-full -top-2 -right-2">
                            2
                        </span>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="flex-shrink-0 relative ml-4">
                            <div>
                                <button type="button"
                                        class="user-menu-button bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900"
                                        aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                         alt="">
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
                                 class="dropdown-menu-notification hidden shadow origin-top-right absolute right-0 mt-2 w-80 rounded-md bg-white py-1 focus:outline-none"
                                 aria-orientation="vertical" tabindex="-1">
                                <a href="#">
                                    <div id="toast-message-cta"
                                         class="cursor-pointer hover:bg-indigo-100 w-full max-w-lg p-4 text-gray-500 bg-white"
                                         role="alert">
                                        <div class="flex">
                                            <img class="h-8 w-8 rounded-full"
                                                 src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                                 alt="">
                                            <div class="ml-3 text-sm font-normal">
                                                <span class="mb-1 text-sm font-semibold text-gray-900">Jese Leos</span>
                                                <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your
                                                    thoughts regarding Flowbite.
                                                </div>
                                            </div>
                                            <button type="button" id="close-modal-notification"
                                                    class="ml-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                                                    data-dismiss-target="#toast-message-cta" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div id="toast-message-cta"
                                         class="cursor-pointer hover:bg-indigo-100 w-full max-w-lg p-4 text-gray-500 bg-white"
                                         role="alert">
                                        <div class="flex">
                                            <img class="h-8 w-8 rounded-full"
                                                 src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                                 alt="">
                                            <div class="ml-3 text-sm font-normal">
                                                <span class="mb-1 text-sm font-semibold text-gray-900">Jese Leos</span>
                                                <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your
                                                    thoughts regarding Flowbite.
                                                </div>
                                            </div>
                                            <button type="button" id="close-modal-notification"
                                                    class="ml-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                                                    data-dismiss-target="#toast-message-cta" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div
                                 class="dropdown-menu-dashboard hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{route('dashboard.dashboard') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-0">Dashboard</a>

                                <a href="{{route('dashboard.profil') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-0">Profil</a>

                                <a href="{{ route('dashboard.settings') }}" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-1">Settings</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" href="{{ route('logout') }}" class="text-left w-full hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-3">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    @else
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
                <x-nav-link kind="primary" id="signin-link" href="{{ route('login') }}" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="{{ Route::currentRouteName() === 'login' ? 'font-extrabold text-purple-700' : '' }}">Sign in</x-nav-link>

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
                            <x-nav-link kind="primary" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-indigo-500" href="{{ route('login') }}">Sign in</x-nav-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endauth
</header>
