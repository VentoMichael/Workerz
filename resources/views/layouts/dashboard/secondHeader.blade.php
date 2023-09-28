<div id="primaryMenu" class="hidden">
    <div class="z-20 flex w-64 flex-col fixed inset-y-0">
        <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 bg-white overflow-y-auto">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button" id="closePrimaryMenu"
                        class=" ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="h-8 w-auto"
                     src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg"
                     alt="Workflow">
            </div>
            <div class="mt-5 flex-grow flex flex-col">
                <nav class="flex-1 px-2 pb-4 space-y-1 flex flex-col justify-between">
                    <div>

                        <a href="{{route('dashboard.dashboard')}}"
                           class="{{ request()->is('dashboard') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                            <svg
                                class="{{ request()->is('dashboard') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                            </svg>

                            <span class="truncate"> Dashboard </span>
                        </a>
                        <a href="{{route('dashboard.profil')}}"
                           class="{{ request()->is('dashboard/profil') || request()->is('dashboard/profil/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                            <svg
                                class="{{ request()->is('dashboard/profil') || request()->is('dashboard/profil/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="truncate"> Profile </span>
                        </a>


                        <a href="{{route('dashboard.messages')}}"
                           class="{{ request()->is('dashboard/messages') || request()->is('dashboard/messages/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor"
                                 class="{{ request()->is('dashboard/messages') || request()->is('dashboard/messages/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                            </svg>

                            <span class="truncate"> Messages </span>
                        </a>
                        @if(auth()->user()->hasRole(1))
                            <a href="{{route('dashboard.plans')}}"
                               class="{{ request()->is('dashboard/plans') || request()->is('dashboard/plans/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium"
                               aria-current="page">
                                <svg
                                    class="{{ request()->is('dashboard/plans') || request()->is('dashboard/plans/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <span class="truncate"> Plan &amp; Billing </span>
                            </a>
                        @endif

                        <a href="{{route('dashboard.settings')}}"
                           class="{{ request()->is('dashboard/settings') || request()->is('dashboard/settings/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                            <svg
                                class="{{ request()->is('dashboard/settings') || request()->is('dashboard/settings/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="truncate"> Settings </span>
                        </a>
                    </div>
                    <a href="{{ route('home') }}"
                       class="text-gray-900 hover:text-gray-900 hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor"
                             class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>

                        <span class="truncate"> Go back home </span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>
<aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3 hidden lg:block">
    <nav class="space-y-1 flex flex-col justify-between gap-12 sticky top-4">
        <div>
            <a href="{{route('dashboard.dashboard')}}"
               class="{{ request()->is('dashboard') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                <svg
                    class="{{ request()->is('dashboard') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                </svg>

                <span class="truncate"> Dashboard </span>
            </a>
            <a href="{{route('dashboard.profil')}}"
               class="{{ request()->is('dashboard/profil') || request()->is('dashboard/profil/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                <svg
                    class="{{ request()->is('dashboard/profil') || request()->is('dashboard/profil/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="truncate"> Profile </span>
            </a>


            <a href="{{route('dashboard.messages')}}"
               class="{{ request()->is('dashboard/messages') || request()->is('dashboard/messages/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="{{ request()->is('dashboard/messages') || request()->is('dashboard/messages/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                </svg>

                <span class="truncate"> Messages </span>
            </a>
            @if(auth()->user()->hasRole(1))
                <a href="{{route('dashboard.plans')}}"
                   class="{{ request()->is('dashboard/plans') || request()->is('dashboard/plans/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium"
                   aria-current="page">
                    <svg
                        class="{{ request()->is('dashboard/plans') || request()->is('dashboard/plans/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    <span class="truncate"> Plan &amp; Billing </span>
                </a>
            @endif

            <a href="{{route('dashboard.settings')}}"
               class="{{ request()->is('dashboard/settings') || request()->is('dashboard/settings/*') ? 'bg-gray-50 text-indigo-600' : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50' }} group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                <svg
                    class="{{ request()->is('dashboard/settings') || request()->is('dashboard/settings/*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="truncate"> Settings </span>
            </a>
        </div>
        <a href="{{ route('home') }}"
           class="text-gray-900 hover:text-gray-900 hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
            </svg>

            <span class="truncate"> Go back home </span>
        </a>

    </nav>
</aside>
