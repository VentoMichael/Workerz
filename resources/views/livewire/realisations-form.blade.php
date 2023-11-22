<form wire:submit.prevent="submitForm" class="divide-y divide-gray-200 lg:col-span-12" action="#" method="GET">
    <!-- Profile section -->
    <div class="py-6 px-4 sm:p-6 lg:pb-8">
        <div>
            <h2 class="text-lg leading-6 font-medium text-gray-900">Realisations</h2>
            <p class="mt-1 text-sm text-gray-500">Ornare eu a volutpat eget vulputate.
                Fringilla
                commodo amet.</p>
        </div>

        @if(count($realisations) < 1)
        <div class="mt-8">
            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2"
                      d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
            </svg>

            <h3 class="mt-2 text-sm font-medium text-gray-900">No realisations</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new
                realisation.</p>
        </div>
    @else
        <!-- Privacy section -->
        <div class="divide-y">

            <div class="flex flex-col my-4">
                @foreach($realisations as $realisation)
                    <div class="block bg-white mt-4">
                        <p class="mb-1 text-md font-bold tracking-tight text-gray-900">{{ $realisation->title }}</p>
                        <p class="text-md text-gray-500 mb-2">{{ $realisation->description }}</p>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                            @foreach($realisation->pictures as $set)
                                <div>
                                    <img class="h-full object-cover max-w-full rounded-lg"
                                         src="{{ asset($set[0]['path']) }}"
                                         srcset="
                            @foreach($set as $index => $image)
                                         {{ asset($image['path']) }} {{ ($index * 2 + 1) }}w,
                                {{ asset($image['webp']) }} {{ ($index * 2 + 2) }}w,
                            @endforeach
                                             "
                                         sizes="(max-width: 1980px) 100vw, 1980px"
                                         alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4 flex gap-2 justify-end">
                        <x-button type="submit" kind="primary">Edit</x-button>
                        <x-button type="submit" kind="danger">Delete</x-button>
                    </div>
                @endforeach

                <div class="mx-auto mt-8">
                    <button type="button"
                            class="whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                        <!-- Heroicon name: solid/plus -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                        New Realisation
                    </button>
                </div>
            </div>

        </div>
@endif
        <form id="realisations-form">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="title"
                           class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input wire:model.lazy="title" type="text" name="title" id="title" autocomplete="title"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="description"
                           class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <input wire:model.lazy="description" type="text" name="description" id="description"
                               autocomplete="description"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-2 text-gray-500 text-sm">
                        Short description (max 256 characters).
                    </p>
                </div>

                <div class="sm:col-span-6">
                    <label for="pictures"
                           class="block text-sm font-medium leading-6 text-gray-900">Pictures</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="pictures"
                               class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div
                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span
                                        class="font-semibold">Click to upload</span> or drag
                                    and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG or GIF (MAX.
                                    1 MB)</p>
                            </div>
                            <input wire:model.lazy="pictures" type="file" class="hidden" id="pictures"
                                   name="pictures[]" accept="image/*" multiple max="5"/>
                        </label>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                        @foreach($pictures as $index => $picture)
                            <div class="relative">
                                <img class="h-auto max-w-full rounded-lg"
                                     src="{{ $picture->temporaryUrl() }}"
                                     alt="Preview">
                                <button wire:click="removePicture({{ $index }})" type="button"
                                        class="top-0 -mt-1 right-0 absolute mr-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                        data-dismiss-target="#alert-3" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>


                </div>


            </div>
            <div class="justify-end flex">
                <x-button type="submit" kind="primary" class="mt-4">Submit</x-button>
            </div>
        </form>
    </div>


</form>
