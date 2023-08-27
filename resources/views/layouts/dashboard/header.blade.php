<div id="overlay" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-80 z-10"></div>


<div class="h-full">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
            <div class="relative h-16 flex justify-between">
                <div class="relative z-10 px-2 flex lg:px-0">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{route('home')}}">
                            <span class="sr-only">Workerz</span>
                            {!! file_get_contents('img/logo.svg') !!}
                        </a>
                    </div>
                </div>
                <div class="relative z-10 flex items-center lg:hidden">
                    <!-- Mobile menu button -->
                    <button id="openPrimaryMenu" type="button"
                            class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:indigo-900"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open menu</span>
                        <!--
                          Icon when menu is closed.

                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!--
                          Icon when menu is open.

                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                    <button type="button" id="notification-user-menu"
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
                                    class="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
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
                        <div id="dropdown-menu-notification"
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
                        <div id="dropdown-menu-dashboard"
                             class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Your Profile</a>

                            <a href="#" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1">Settings</a>

                            <a href="#" class="hover:bg-indigo-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <nav class="lg:hidden" aria-label="Global">
            <div class="border-t border-gray-200 pt-4 pb-3">
                <div class="px-4 flex items-center">
                    <div id="user-menu-button-mobile" class="px-2 flex cursor-pointer">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80"
                                 alt="">
                        </div>
                        <!-- TODO: put LM in the background if no image


                        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <span class="font-medium text-gray-600 dark:text-gray-300">JL</span>
                        </div>


                         -->
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">Lisa Marie</div>
                            <div class="text-sm font-medium text-gray-500">lisamarie@example.com</div>
                        </div>
                    </div>

                    <div class="relative ml-auto">
                        <button id="notification-user-menu-mobile" type="button"
                                class="ml-auto flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:indigo-900">
                            <span class="sr-only text-black">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </button>
                        <div id="dropdown-menu-notification-mobile"
                             class="hidden shadow origin-top-right absolute right-0 mt-2 w-80 rounded-md bg-white py-1 focus:outline-none"
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
                    </div>
                </div>
                <div id="dropdown-menu-dashboard-mobile" class="hidden mt-3 px-2 space-y-1">
                    <a href="#"
                       class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your
                        Profile</a>

                    <a href="#"
                       class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Settings</a>

                    <a href="#"
                       class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Sign
                        out</a>
                </div>
            </div>
        </nav>
    </header>

