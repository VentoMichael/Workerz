<div class="top-5 absolute right-6 inline-block text-left"
     x-data="{ isSharingOpen{{ $id }}: false, isReportingOpen{{ $id }}: false }">
    <div x-data="{ showMessage: @if($successMessage) true @else false @endif }">
        @if($successMessage)
            <div x-show="showMessage" x-init="setTimeout(() => showMessage = false, 5000)">
                @include('components.success-message', ['message' => $successMessage,'clearProperty' => 'successMessage'])
            </div>
        @endif
    </div>
    <div class="flex gap-1">

        <button wire:click="toggleSharing" @click="isSharingOpen{{ $id }} = true" type="button"
                class="inline-flex items-center justify-center w-full px-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                id="dropdown-menu-button" aria-expanded="true" aria-haspopup="true">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="1em"
                 viewBox="0 0 512 512">
                <path
                    d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/>
            </svg>

        </button>
        <button wire:click="toggleReporting" @click="isReportingOpen{{ $id }} = true" type="button"
                class="inline-flex items-center justify-center w-full px-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                id="dropdown-menu-button" aria-expanded="true" aria-haspopup="true">
            <span class="text-2xl">...</span>
        </button>
    </div>
    @if($isSharingOpen)
        <div x-show="isSharingOpen{{ $id }}" @click.away="isSharingOpen{{ $id }} = false"
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
                        <svg fill="#000000" class="w-8 h-8" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g
                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
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
                   target="_blank" class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">
                    <button type="button"
                            class="flex text-sm text-gray-700 items-center gap-4"
                            id="dropdown-menu-button" aria-expanded="true"
                            aria-haspopup="true">
                        <svg viewBox="0 0 20 20" class="w-7 h-7" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-180.000000, -7479.000000)"
                                       fill="#000000">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
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
    @endif
    @if($isReportingOpen)
        <div x-show="isReportingOpen{{ $id }}" @click.away="isReportingOpen{{ $id }} = false"
             class="content-signal-worker-{{ $id }} z-10 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
             role="menu" aria-orientation="vertical"
             aria-labelledby="dropdown-menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <div x-data="{ showModal: false }">
                    <div wire:click="$set('reportSubmitted', true)" @click="showModal = !showModal"
                         class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">
                        <button type="button"
                                class="flex text-sm text-gray-700 items-center gap-4"
                                id="dropdown-menu-button" aria-expanded="true"
                                aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                 height="1em" viewBox="0 0 448 512">
                                <path
                                    d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32V64 368 480c0 17.7 14.3 32 32 32s32-14.3 32-32V352l64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30V66.1c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48V32z"/>
                            </svg>
                            <span class="text-left">Signaler ce travailleur</span>
                        </button>
                    </div>
                    <div wire:click="copyUrl" x-data="{ url: '{{ url()->current() . '/' . $username  }}' }"
                         class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">
                        <button @click="copyUrl(url)" type="button"
                                class="flex text-sm text-gray-700 items-center gap-4"
                                id="dropdown-menu-button" aria-expanded="true"
                                aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                 height="1em" viewBox="0 0 640 512">
                                <path
                                    d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/>
                            </svg>
                            <span class="text-left">Copier le lien</span>
                        </button>
                    </div>
                    @if($reportSubmitted)
                        <div x-show="showModal"
                             class="fixed absolute z-10 z-50"
                             @click="showModal = false">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                <div
                                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                    <div @click.stop
                                         class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:max-w-lg">
                                        <div @click.stop class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                            <div @click.stop class="sm:flex sm:items-start">
                                                <div
                                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="text-blue-800 inline w-5 h-5" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                    <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                        id="modal-title">Report {{$username}}
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">Are you sure you want to report
                                                            this
                                                            worker? Please provide details about the issue you are
                                                            reporting.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <form wire:submit.prevent="submitReport" @click.stop>
                                                <div class="mt-4">
                                                    <label for="subject"
                                                           class="block text-sm font-medium text-gray-700">Subject</label>
                                                    <select wire:model.lazy="subject" id="subject" name="subject"
                                                            class="@error('subject') border border-red-500 @enderror mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                        <option wire:ignore value="" selected disabled>Choose a
                                                            reporting
                                                            subject
                                                        </option>
                                                        <option value="Harassment">Harassment</option>
                                                        <option value="Unprofessional behavior">Unprofessional behavior
                                                        </option>
                                                        <option value="Non-compliance with guidelines">Non-compliance
                                                            with
                                                            guidelines
                                                        </option>
                                                        <option value="Security concern">Security concern</option>
                                                        <option value="Other">Other</option>
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
                                                              kind="primary" class="disabled:opacity-50 ml-3">
                                                        Send
                                                        <svg wire:loading wire:target="submitReport" aria-hidden="true"
                                                             class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                                                             viewBox="0 0 100 101" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                                fill="currentColor"/>
                                                            <path
                                                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                                fill="currentFill"/>
                                                        </svg>
                                                    </x-button>
                                                    <x-button @click="showModal = false" type="submit" kind="secondary">
                                                        Cancel
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
    @endif

</div>
