<form action="{{route('sign-up.confirmation')}}">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so
                be careful what you share.</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="username"
                           class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="username" id="username" autocomplete="username"
                                   class="pl-2 block flex-1 border-0 bg-transparent py-1.5 pl-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="janesmith">
                        </div>
                    </div>

                    <p class="mt-3 text-sm leading-6 text-gray-600">It will be used to find your profile.</p>
                </div>

                <div class="col-span-full">
                    <label for="about"
                           class="block text-sm font-medium leading-6 text-gray-900">About</label>
                    <div class="mt-2">
                                    <textarea id="about" name="about" rows="3"
                                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about
                        yourself.</p>
                </div>

                <div class="col-span-full">
                    <label for="photo"
                           class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="file-upload"
                               class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                        </label>
                    </div>
                </div>

            </div>
        </div>

        <div class="pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Connexion Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password
                    </label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-nav-link href="{{ route('sign-up.role') }}" class="max-w-xs" kind="secondary">Go back</x-nav-link>
        <x-button type="submit" class="max-w-xs" kind="primary">Continue to next step</x-button>
    </div>
</form>
