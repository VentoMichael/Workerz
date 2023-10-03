<div class="max-h-screen overflow-y-hidden sm:overflow-y-auto lg:col-start-2 md:col-span-3">
    @foreach($ads as $ad)
        <div wire:key="content-{{$ad->id}}" x-cloak x-show="selectedPreview === {{ $ad->id }} || activeAd === {{ $ad->id }}" >

            <section id="content-of-ad-{{ $ad->id }}"
                     class="m-px overflow-y-scroll sm:overflow-hidden bottom-0 z-10 bg-white shadow sm:rounded-md block overflow-hidden">
                <div class="bg-white px-4 py-5 sm:px-6">

                    <svg x-data="{ isHidden: window.innerWidth > 768 }" x-bind:hidden="isHidden"
                         class="cursor-pointer w-6 icon-back mb-8" id="icon-back-1"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"></path>
                    </svg>

                    <div class="max-w-screen-lg mx-auto relative">
                        <div class="flex justify-between ">
                            <h3 class="text-2xl font-semibold mb-4">{{ $ad->title }}</h3>

                            <livewire:report-ad :ad="$ad"/>

                        </div>
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full md:w-1/3 mt-2">
                                <p class="font-semibold">Location:</p>
                                <p class="text-gray-700">{{ $ad->region['name'] }}</p>
                            </div>
                            <div class="w-full md:w-1/3 mt-2">
                                <p class="font-semibold">Timeline:</p>
                                <p class="text-gray-700">{{ $ad->formattedStartedAt }}</p>
                            </div>
                            <div class="w-full md:w-1/3 mt-2">
                                <p class="font-semibold">Budget:</p>
                                <p class="text-gray-700">{{ floatval($ad->budget) }} €</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="font-semibold">Job Description:</p>
                            <p class="text-gray-700 leading-normal">{{ $ad->description }}</p>
                        </div>
                        <div class="mb-4 flex justify-between">
                            <div class="flex items-end">
                                <svg class="w-4 relative -top-0.5" fill="bg-gray-500"
                                     viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                          d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                </svg>
                                <p class="ml-2 text-gray-500 text-sm">
                                    Posted {{ $ad->formattedCreatedAt }} ago
                                    <span>&bull; {{ $ad->candidats }} candidats</span>
                                </p>
                            </div>
                            <a href="{{route('ads.show')}}">
                                <x-button kind="primary">Chat now</x-button>
                            </a>
                        </div>
                    </div>
                    @if($ad->user->hasRole(1))
                        <div class="max-w-screen-lg mx-auto relative border-t-2 pt-6 mt-12">
                            <div class="flex justify-between ">

                                <p class="text-2xl font-semibold mb-4">Info sur l'entreprise</p>

                            </div>
                            <a href="{{ route('workers.show',['name' => $ad->user->company->name]) }}"
                               class="flex gap-2 align-middle items-center">
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
                                <span
                                    class="text-gray-700 leading-normal font-bold text-lg">{{ $ad->user->company->name }}</span>
                            </a>
                            <div class="flex flex-col flex-wrap mb-4">
                                <div class="mb-4 mt-4">
                                    <p class="text-gray-700 leading-normal">{{ $ad->user->company->about }}</p>
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
                                            Joined the {{ $ad->user->company->created_at->format('d/m/y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

        </div>
    @endforeach
</div>
