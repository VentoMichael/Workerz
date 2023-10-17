<form wire:submit="submitForm" action="{{ route('post.sign-up.account') }}" method="post">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so
                be careful what you share.</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name"
                           class="block text-sm font-medium leading-6 text-gray-900">Company name <span
                            class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <div
                            class="@error('name')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror flex rounded-md shadow-sm ring-inset focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workerz.be/workers/</span>
                            <input wire:model.live="name" type="text" name="name"
                                   id="name" autocomplete="name"
                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="workezSRL">
                        </div>
                    </div>
                    @error('name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="about"
                           class="block text-sm font-medium leading-6 text-gray-900">About <span
                            class="text-red-500">*</span></label>
                    <div class="mt-2">
                                    <textarea id="about" wire:model.blur="about" name="about" rows="3"
                                              class="@error('about')border border-red-500 @else border-0 ring-gray-300 ring-1 @enderror p-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Write a few sentences about
                        yourself.</p>
                    @error('about')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-span-full">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-2 flex gap-x-3 flex-col">
                        <div class="relative">
                            @if($logoUpload && $tempUrlLogo !== '' && isset($tempUrlLogo))

                                <button wire:click.lazy="$set('tempUrlLogo',null)" type="button"
                                        class="inset-y-1/2 -mt-1 -left-1 absolute mr-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                        data-dismiss-target="#alert-3" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                        <div class="flex gap-3 items-end mb-2">
                            @if($logoUpload && $tempUrlLogo !== '' && isset($tempUrlLogo))
                                <img class="h-20 w-20 text-gray-300 rounded-full object-cover" src="{{$tempUrlLogo}}" alt="">
                            @else
                                <svg class="h-20 w-20 text-gray-300 object-cover" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            @endif
                            <label class="cursor-pointer">
                            <span
                                class="text-sm whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-2.5 py-1.5 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">Select Avatar</span>
                                <input wire:model.blur="logoUpload" type='file' class="hidden"/>
                            </label>
                        </div>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPEG or
                            WEBP up to 1MB.</p>
                        @error('logoUpload')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="col-span-full mt-8">
                <label for="backgroundUpload" class="block text-sm font-medium leading-6 text-gray-900">Cover
                    photo</label>
                <div
                    @if($backgroundUpload)
                    style="background-image: url('{{ $tempUrlCover }}'); background-position: center;background-repeat: no-repeat;background-size: cover;"
                    @endif
                    class="@error('$backgroundUpload')border border-red-500 rounded-md @enderror mt-2 flex justify-center rounded-lg border border-dashed relative border-gray-900/25 px-6 py-10">
                    @if($backgroundUpload && $tempUrlCover !== '' && isset($tempUrlCover))
                        <button wire:click.lazy="$set('tempUrlCover',null)" type="button"
                                class="top-3 right-3 absolute ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    @endif
                    <div class="text-center bg-white p-4 rounded-md">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                             fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                            <label for="backgroundUpload"
                                   class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input wire:model.blur="backgroundUpload" id="backgroundUpload"
                                       name="backgroundUpload" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">SVG, PNG, JPEG or
                            WEBP up to 3MB</p>
                    </div>
                </div>
                @error('backgroundUpload')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="jobTitle" class="block text-sm font-medium leading-6 text-gray-900">Main Job
                        Title <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input wire:model.blur="jobTitle" type="text" name="jobTitle" id="jobTitle"
                               autocomplete="jobTitle"
                               class="@error('jobTitle')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Enter your primary job title or role.</p>
                    @error('jobTitle')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="mainSkill" class="block text-sm font-medium leading-6 text-gray-900">General
                        Skill <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <select wire:model.blur="mainSkill" id="mainSkill"
                                class="@error('mainSkill')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option selected>Choose a skill</option>
                            @foreach($skills as $mainSkill)
                                <option value="{{$mainSkill['id']}}">{{$mainSkill['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Enter a general skill or area of expertise.</p>
                    @error('mainSkill')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="mt-6">
                <label for="skills" class="block text-sm font-medium leading-6 text-gray-900">
                    Sub skills <span class="text-gray-500 text-xs">(limited to {{ $maxSkills }})</span>
                </label>
                <div class="relative mt-2">
                    <input
                        wire:model.blur="typeSkill"
                        type="text"
                        id="skills"
                        @if(count($selectedSkills) === $maxSkills) disabled @endif
                        class="@if(count($selectedSkills) === $maxSkills) bg-gray-100 cursor-not-allowed focus:ring-0 @else ring-inset ring-gray-300 ring-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600  @endif border-0 px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6"
                        placeholder="Select or filter skills"
                        wire:keyup="filterSkills"
                        wire:click="toggleSkillsList"
                    >

                    @if ($showSkillsList && count($filteredSkills) !== 0 && count($selectedSkills) < $maxSkills)
                        <div
                            class="skills-list absolute mt-1 w-full z-10 bg-white border border-gray-300 rounded-md shadow-lg max-h-40 overflow-x-auto"
                            id="listSkills">
                            @foreach($filteredSkills as $skill)
                                @unless(in_array($skill['id'], $selectedSkills))
                                    <span wire:key="skill-{{ $skill['id'] }}"
                                          wire:click="addSkill('{{ $skill['id'] }}')"
                                          class="cursor-pointer hover:bg-indigo-100 block text-sm font-medium leading-6 text-gray-900 p-2"
                                    >
                            {{ $skill['name'] }}
                        </span>
                                @endunless
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mt-2">
                    @if (count($filteredSkills) === 0 && $showSkillsList)
                        <div class="text-gray-500">No results found.</div>
                    @else
                        @foreach($this->getSelectedSkillNameId() as $skillId => $skillName)
                            <div wire:key="skill-{{ $skillId }}"
                                 class="inline-flex items-center bg-purple-100 rounded-lg p-1 my-1">
                                <span
                                    class="inline-flex items-center px-2 py-1 text-sm font-medium text-purple-800 rounded">{{ $skillName }}</span>
                                <div wire:click="removeSkill('{{ $skillId }}')"
                                     class="cursor-pointer text-red-600 hover:text-red-800 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


        </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12 pt-4">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
            mail.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">First
                    name <span class="text-red-500">*</span></label>
                <div class="mt-2">
                    <input wire:model.blur="firstname" type="text" name="firstname" id="firstname"
                           autocomplete="firstname"
                           class="@error('firstname')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('firstname')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-3">
                <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Last
                    name <span class="text-red-500">*</span></label>
                <div class="mt-2">
                    <input wire:model.blur="lastname" type="text" name="lastname" id="lastname"
                           autocomplete="lastname"
                           class="@error('lastname')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('lastname')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                    address <span class="text-red-500">*</span></label>
                <div class="mt-2">
                    <input wire:model.blur="email" id="email" name="email" type="email"
                           autocomplete="email"
                           class="@error('email')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('email')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-3">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password <span
                        class="text-red-500">*</span></label>
                <div class="mt-2 relative">
                    <input wire:model.blur="password" id="password" name="password"
                           type="{{ $passwordVisible ? 'text' : 'password' }}"
                           autocomplete="password"
                           class="@error('password')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <div wire:click="togglePasswordVisibility"
                         class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                        @if ($passwordVisible)
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                <style>.svg {
                                        fill: #5850ec
                                    }</style>
                                <path
                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                            </svg>
                        @else
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                <style>.svg {
                                        fill: #5850ec
                                    }</style>
                                <path
                                    d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                            </svg>
                        @endif
                    </div>
                </div>
                @error('password')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="streetAddress" class="block text-sm font-medium leading-6 text-gray-900">Street
                    address <span class="text-red-500">*</span></label>
                <div class="mt-2">
                    <input wire:model.blur="streetAddress" type="text" name="streetAddress" id="streetAddress"
                           autocomplete="streetAddress"
                           class="@error('streetAddress')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('streetAddress')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2 sm:col-start-1">
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City <span
                        class="text-red-500">*</span></label>
                <div class="mt-2">
                    <input wire:model.blur="city" type="text" name="city" id="city" autocomplete="city"
                           class="@error('city')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('city')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="regions" class="block text-sm font-medium leading-6 text-gray-900">
                    State / Province <span class="text-gray-500 text-xs">(limited to {{ $maxRegions }})</span>
                </label>
                <div class="relative mt-2">
                    <input
                        wire:model.blur="typeRegion"
                        type="text"
                        id="regions"
                        @if(count($selectedRegions) === $maxRegions) disabled @endif
                        class="@if(count($selectedRegions) === $maxRegions) bg-gray-100 cursor-not-allowed focus:ring-0 @else ring-inset ring-gray-300 ring-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600  @endif border-0 px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6"
                        placeholder="Select or filter regions"
                        wire:keyup="filterRegions"
                        wire:click="toggleRegionsList"
                    >

                    @if ($showRegionsList && count($filteredRegions) !== 0 && count($selectedRegions) < $maxRegions)
                        <div
                            class="regions-list absolute mt-1 w-full z-10 bg-white border border-gray-300 rounded-md shadow-lg max-h-40 overflow-x-auto"
                            id="listRegions">
                            @foreach($filteredRegions as $region)
                                @unless(in_array($region['id'], $selectedRegions))
                                    <span wire:key="region-{{ $region['id'] }}"
                                          wire:click="addRegion('{{ $region['id'] }}')"
                                          class="cursor-pointer hover:bg-indigo-100 block text-sm font-medium leading-6 text-gray-900 p-2"
                                    >
                            {{ $region['name'] }}
                        </span>
                                @endunless
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mt-2">
                    @if (count($filteredRegions) === 0 && $showRegionsList)
                        <div class="text-gray-500">No results found.</div>
                    @else
                        @foreach($this->getSelectedRegionNameId() as $regionId => $regionName)
                            <div wire:key="region-{{ $regionId }}"
                                 class="inline-flex items-center bg-purple-100 rounded-lg p-1 my-1">
                                <span
                                    class="inline-flex items-center px-2 py-1 text-sm font-medium text-purple-800 rounded">{{ $regionName }}</span>
                                <div wire:click="removeRegion('{{ $regionId }}')"
                                     class="cursor-pointer text-red-600 hover:text-red-800 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @error('region')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="postalCode" class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                    Postal code <span class="text-red-500">*</span></label>
                <div class="mt-2">
                    <input wire:model.blur="postalCode" type="text" name="postalCode" id="postalCode"
                           autocomplete="postalCode"
                           class="@error('postalCode')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('postalCode')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="sm:col-span-2">
                <label for="phoneNumber1" class="block text-sm font-medium leading-6 text-gray-900">Phone number
                    1</label>
                <input wire:model="phoneNumber1" type="number" name="phoneNumber1" id="phoneNumber1"
                       autocomplete="phoneNumber1"
                       class="@error('phoneNumber1')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('phoneNumber1')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                @if(!$showPhoneNumber3 || $showPhoneNumber3 && !$showPhoneNumber2)
                    <p wire:click="addPhoneNumbers" class="cursor-pointer text-blue-500 hover:underline">
                        Add another
                    </p>
                @endif
            </div>

            @if ($showPhoneNumber2)
                <div class="sm:col-span-2">
                    <label for="phoneNumber2" class="block text-sm font-medium leading-6 text-gray-900">Phone number
                        2</label>
                    <div class="relative">
                        <input wire:model="phoneNumber2" type="number" name="phoneNumber2" id="phoneNumber2"
                               autocomplete="phoneNumber2"
                               class="@error('phoneNumber2')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <button type="button" wire:click="removePhoneNumber2"
                                class="absolute top-1.5 right-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 p-0.5 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="text-white w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </button>
                        @error('phoneNumber2')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            @endif

            @if ($showPhoneNumber3)
                <div class="sm:col-span-2">
                    <label for="phoneNumber3" class="block text-sm font-medium leading-6 text-gray-900">Phone
                        number @if($showPhoneNumber2)3 @else 2 @endif</label>
                    <div class="relative">
                        <input wire:model="phoneNumber3" type="number" name="phoneNumber3" id="phoneNumber3"
                               autocomplete="phoneNumber3"
                               class="@error('phoneNumber3')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <button type="button" wire:click="removePhoneNumber3"
                                class="absolute top-1.5 right-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 p-0.5 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="text-white w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </button>
                        @error('phoneNumber3')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            @endif
        </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12 mt-4">
        <div class="flex">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Plans</h2>  <span class="text-red-500">*</span>
        </div>
        <p class="mt-1 text-sm mx-auto leading-6 text-gray-600">We'll always let you know about important
            changes, but you pick what else you want to hear about.</p>

        <div class="mt-4 space-y-10" id="changePlan">
            <fieldset>
                <legend class="sr-only">Pricing plans</legend>
                <div x-data="{ annualBilling: false }">
                    <div
                        class="@error('plan')border border-red-500 @enderror relative bg-white rounded-md -space-y-px">

                        @foreach($plans as $plan)
                            <label
                                class="label_pricing justify-between relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                                <div class="flex items-center text-sm">
                                    <input wire:model.blur="plan" type="radio" name="plan"
                                           value="{{ $plan->name }}"
                                           class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                           aria-labelledby="pricing-plans-0-label"
                                           aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                    <span id="pricing-plans-0-label"
                                          class="pricing-plans-span ml-3 font-medium">{{ $plan->name }}</span>
                                </div>
                                <template x-if="annualBilling">
                                    <p x-cloak class="font-medium text_price">
                                        {{ $plan->price_yearly }}€
                                        <span class="text-gray-500">/yearly</span>
                                    </p>
                                </template>
                                <template x-if="!annualBilling">
                                    <p x-cloak class="font-medium text_price">
                                        {{ $plan->price_monthly }}€
                                        <span class="text-gray-500">/monthly</span>
                                    </p>
                                </template>

                            </label>
                        @endforeach

                    </div>

                    <div class="flex">
                        @error('plan')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                        <label class="relative ml-auto mt-4 inline-flex mb-4 items-center cursor-pointer">
                            <input wire:click="toggleAnnualBilling()" type="checkbox" x-model="annualBilling"
                                   name="annualBilling" class="sr-only peer">
                            <div
                                class="mr-4 w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-200 peer-checked:after:translate-x-full peer-checked:after:border-purple-700 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-purple-700 after:border-purple-700 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-indigo-600 peer-checked:bg-indigo-300"></div>
                            <span class="mr-2 text-sm font-medium text-gray-900">Annual billing </span>
                            <span class="text-sm text-gray-500">(Save 10%)</span>
                        </label>
                    </div>
                </div>

            </fieldset>


        </div>

    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-nav-link href="{{ route('sign-up.role') }}" class="max-w-xs" kind="secondary">Go back</x-nav-link>
        <x-button type="submit" kind="primary" class="max-w-xs disabled:opacity-50">
            Continue to next step
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
</form>

@section('scripts')
    <script>
        const radioInputs = document.querySelectorAll('input[name="plan"]');
        const pricingLabels = document.querySelectorAll('.label_pricing');
        const pricingSpans = document.querySelectorAll('.pricing-plans-span');

        radioInputs.forEach(function (input, index) {
            input.addEventListener('change', function () {
                radioInputs.forEach(function (radio, i) {
                    if (i !== index) {
                        pricingLabels[i].classList.remove('bg-indigo-50', 'border-indigo-200', 'z-10');
                        pricingLabels[i].classList.add('border-gray-200');
                        pricingSpans[i].classList.remove('text-indigo-900');
                        pricingSpans[i].classList.add('text-gray-900');
                    } else {
                        pricingLabels[i].classList.add('bg-indigo-50', 'border-indigo-200', 'z-10');
                        pricingLabels[i].classList.remove('border-gray-200');
                        pricingSpans[i].classList.add('text-indigo-900');
                        pricingSpans[i].classList.remove('text-gray-900');
                    }
                });
            });
        });
    </script>
@endsection

