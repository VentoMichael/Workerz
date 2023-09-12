<form wire:submit="submitForm" method="POST">

    <div class="shadow sm:rounded-md sm:overflow-hidden">

        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            @if($successMessage)
                @include('components.success-message', ['message' => $successMessage,'clearProperty' => 'successMessage'])
            @endif
            @if($infoMessage)
                @include('components.info-message', ['message' => $infoMessage,'clearProperty' => 'infoMessage'])
            @endif
            <div class="mb-6">
                <h1 class="text-lg leading-6 font-medium text-gray-900">Profile</h1>
                <p class="mt-1 text-sm text-gray-500">This information will be displayed
                    publicly so
                    be careful what you share.</p>
            </div>
            <div class="mt-6 flex-grow lg:mt-0 lg:flex-grow-0 lg:flex-shrink-0 relative">
                <p class="text-sm font-medium text-gray-700 mb-2" aria-hidden="true">Background
                    picture</p>
                <div class="mt-1 lg:hidden">
                    <div class="flex items-center relative">
                        @if (!$showBackgroundImage && (!$containsDefaultBackground || isset($backgroundUpload)))
                            <button wire:click.lazy="removeBackgroundImage" type="button"
                                    class="z-10 inset-y-1/2 mt-[-16px] right-3 absolute ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                    data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        @endif
                        <div
                            class="flex-shrink-0 inline-block rounded-md overflow-hidden h-12 w-12"
                            aria-hidden="true">
                            @if ($backgroundUpload)
                                <img class="w-full relative h-40"
                                     src="{{ $backgroundUpload->temporaryUrl() }}"
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @else
                                <img class="w-full relative h-40"
                                     srcset="
                                                                 @if ($showBackgroundImage)
                                     @foreach(\Illuminate\Support\Facades\Auth::user()->backgroundUpload as $imagePath)
                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                        @endforeach
                                     @else
                                     @foreach($defaultBackgrounds as $imagePath)
                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                        @endforeach                         @endif
                                         "
                                     src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->backgroundUpload) ? \Illuminate\Support\Facades\Auth::user()->backgroundUpload[0] : \Illuminate\Support\Facades\Auth::user()->backgroundUpload)) }}"
                                     alt="Background Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @endif


                        </div>
                        <div class="ml-5 rounded-md shadow-sm">
                            <div
                                class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                <label for="mobile-user-photo"
                                       class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                    <span>Change</span>
                                    <span class="sr-only"> background photo</span>
                                </label>
                                <input wire:model.blur="backgroundUpload" id="mobile-user-background"
                                       name="user-background"
                                       type="file"
                                       class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300">
                            </div>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG up to 2MB</p>
                    </div>
                </div>
                <div class="hidden relative rounded-md overflow-hidden lg:block">
                    @if ($showBackgroundImage && (!$containsDefaultBackground || isset($backgroundUpload)))

                        <button wire:click.lazy="removeBackgroundImage" type="button"
                                class="z-10 inset-y-1/2 mt-[-16px] top-6 right-4 absolute ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    @endif
                    <div class="h-40">

                        @if($backgroundUpload)
                            <img class="object-cover w-full h-full relative"
                                 src="{{ $backgroundUpload->temporaryUrl() }}"
                                 alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                        @else

                            <img class="object-cover w-full h-full relative"
                                 srcset="
                                                                 @if ($showBackgroundImage)

                                 @foreach(\Illuminate\Support\Facades\Auth::user()->backgroundUpload as $imagePath)
                                 {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                        @endforeach
                                 @else
                                 @foreach($defaultBackgrounds as $imagePath)
                                 {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                        @endforeach                         @endif

                                     "
                                 src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->backgroundUpload) ? \Illuminate\Support\Facades\Auth::user()->backgroundUpload[0] : \Illuminate\Support\Facades\Auth::user()->backgroundUpload)) }}"
                                 alt="Background Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>

                        @endif
                    </div>
                    <label for="desktop-user-photo"
                           class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                        <span>Change</span>
                        <span class="sr-only"> background photo</span>
                        <input wire:model.blur="backgroundUpload" type="file" id="desktop-user-background"
                               name="user-background"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300">
                    </label>
                </div>
                @error('backgroundUpload')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div class="sm:col-span-4">
                        <label for="username"
                               class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                                    <span
                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workerz.be/workers/</span>
                                <input readonly disabled wire:model.blur="username" type="text" name="username"
                                       id="username" autocomplete="username"
                                       class="disabled:opacity-50 disabled:cursor-not-allowed block flex-1 border-0 bg-transparent py-1.5 pl-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="about"
                               class="block text-sm font-medium leading-6 text-gray-900">About</label>
                        <div class="mt-2">
                                    <textarea wire:model.blur="about" id="about" name="about" rows="3"
                                              class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Write a few sentences about
                            yourself.</p>
                        @error('about')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0 relative">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                    @if ($showAvatarImage && (is_array(Auth::user()->avatarUpload) || isset($avatarUpload)))

                        <button wire:click.lazy="removeAvatarImage" type="button"
                                class="z-10 inset-y-1/2 mt-[-16px] top-4 right-4 absolute ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    @endif
                    <div class="mt-1 lg:hidden relative">

                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12"
                                aria-hidden="true">

                                @if($avatarUpload)
                                    <img class="object-cover w-full h-full relative"
                                         src="{{ $avatarUpload->temporaryUrl() }}"
                                         alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                @else
                                    @if(!is_array(Auth::user()->avatarUpload))
                                        <img class="object-cover w-full h-full relative"
                                             src="{{ asset('storage/' .  \Illuminate\Support\Facades\Auth::user()->avatarUpload) }}"
                                             alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                        />

                                    @else
                                        <img class="object-cover w-full h-full relative"
                                             srcset="
                                        @if ($showAvatarImage)
                                             @foreach(\Illuminate\Support\Facades\Auth::user()->avatarUpload as $imagePath)
                                             {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                             @endforeach
                                             @else
                                             @foreach($defaultBackgrounds as $imagePath)
                                             {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                        @endforeach                         @endif
                                                 "
                                             src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->avatarUpload) ? \Illuminate\Support\Facades\Auth::user()->avatarUpload[0] : \Illuminate\Support\Facades\Auth::user()->avatarUpload)) }}"
                                             alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                                    @endif
                                @endif


                            </div>
                            <div class="ml-5 rounded-md shadow-sm">
                                <div
                                    class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                    <label for="mobile-user-photo"
                                           class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                    </label>
                                    <input wire:model.blur="avatarUpload" id="mobile-user-photo" name="user-photo"
                                           type="file"
                                           class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden relative rounded-full overflow-hidden lg:block">
                        @if($avatarUpload)
                            <img class="object-cover relative rounded-full w-40 h-40"
                                 src="{{ $avatarUpload->temporaryUrl() }}"
                                 alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                        @else
                            @if(!is_array(Auth::user()->avatarUpload))
                                <img class="relative rounded-full w-40 h-40"
                                     src="{{ asset('storage/' .  \Illuminate\Support\Facades\Auth::user()->avatarUpload) . '.svg' }}"
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>

                            @else
                                <img class="relative rounded-full w-40 h-40"
                                     @if ($showAvatarImage)
                                     srcset="
                                     @foreach(\Illuminate\Support\Facades\Auth::user()->avatarUpload as $imagePath)
                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                                             @endforeach
                                         "
                                     src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->avatarUpload) ? \Illuminate\Support\Facades\Auth::user()->avatarUpload[0] : \Illuminate\Support\Facades\Auth::user()->avatarUpload)) }}"

                                     @else
                                     src="{{ asset('storage/'. $defaultAvatar . '.svg') }}"

                                     @endif
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @endif
                        @endif
                        <label for="desktop-user-photo"
                               class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                            <input wire:model.blur="avatarUpload" type="file" id="desktop-user-photo" name="user-photo"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>
                    @error('avatarUpload')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                    <div class="mt-2">
                        <input wire:model.blur="firstname" type="text" name="firstname" id="firstname"
                               autocomplete="firstname"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('firstname')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="sm:col-span-3">
                    <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Last
                        name</label>
                    <div class="mt-2">
                        <input wire:model.blur="lastname" type="text" name="lastname"
                               id="lastname" autocomplete="lastname"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('lastname')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email"
                               readonly disabled wire:model.live="email"
                               autocomplete="email"
                               class="disabled:opacity-50 disabled:cursor-not-allowed px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="streetAddress"
                           class="block text-sm font-medium leading-6 text-gray-900">Street
                        address</label>
                    <div class="mt-2">
                        <input wire:model.blur="streetAddress" type="text" name="streetAddress"
                               id="streetAddress"
                               autocomplete="streetAddress"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('street')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city"
                           class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input wire:model.blur="city" type="text" name="city" id="city"
                               autocomplete="city"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('city')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State
                        /
                        Province</label>
                    <div class="mt-2">
                        <input wire:model.blur="region" type="text" name="region" id="region"
                               autocomplete="region"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('region')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="postalCode"
                           class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                        Postal code</label>
                    <div class="mt-2">
                        <input wire:model.blur="postalCode" type="text" name="postalCode"
                               id="postalCode" autocomplete="postalCode"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('postalCode')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 -mx-6 -mb-8 mt-6">
                <x-button type="submit" kind="primary" class="disabled:opacity-50">
                    Save
                    <svg wire:loading wire:target="submitForm" aria-hidden="true"
                         class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                         viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor"/>
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill"/>
                    </svg>
                </x-button>
            </div>
        </div>

    </div>

</form>
