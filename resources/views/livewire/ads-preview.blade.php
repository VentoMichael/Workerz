
    <div class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-4 ">
        <section>
            @if(count($ads) > 0)
                <p class="text-xs mb-2">About {{ count($ads) }} result{{ count($ads) > 1 ? 's': '' }}</p>

                <div
                    x-data="{ activeAd: window.innerWidth > 768 ? {{ $ads[0]->id }} : null,selectedPreview: window.innerWidth > 768 ? {{ $ads[0]->id }} : null }"
                    class="grid grid-cols-1 gap-2 md:max-w-7xl md:grid-flow-col-dense md:grid-cols-3">
                    <div
                        class="max-h-screen overflow-y-hidden sm:overflow-y-auto space-y-6 md:col-start-1 sm:overflow-hidden p-1">
                        @foreach($ads as $ad)
                            <div wire:key="preview-{{$ad['id']}}"
                                 @click="selectedPreview = {{ $ad['id'] }},activeAd = {{ $ad['id'] }}"
                                 id="preview-ad-{{ $ad['id'] }}">
                                <section id="title-of-ad-{{ $ad['id'] }}"
                                         class="cursor-pointer title-of-ad bg-white shadow sm:rounded-md block overflow-visible hover:bg-indigo-50"
                                         :class="{ 'border-indigo-500 ring-2 ring-indigo-500 bg-indigo-100': activeAd === {{ $ad['id'] }} }">
                                    <div
                                        class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 md:grid-cols-1 lg:grid-cols-48-1">

                                        <div class="flex-shrink-0 self-center">
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
                                        </div>
                                        <div class="flex justify-between flex-col w-full gap-2">

                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <div class="flex text-sm">
                                                        <p class="text-indigo-600 text-xl font-medium">{{ $ad['title'] }}</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="flex md:grid md:grid-cols-100px gap-6 sm:gap-2 ">
                                                <div
                                                    class="mt-2 gap-1 flex items-center text-sm text-indigo-500 sm:mt-0">
                                                    <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path
                                                            d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"></path>
                                                    </svg>
                                                    <p class="flex items-center text-sm text-gray-500 sm:mt-0">
                                                        {{ $ad['user']['firstname'] . ' ' . $ad['user']['lastname'] }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="mt-2 gap-1 flex items-center text-sm text-indigo-500 sm:mt-0">
                                                    <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                              d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                                                    </svg>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 gap-1">
                                                        {{ $ad['region']['name'] }}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col px-4 py-4 sm:px-6 flex gap-4">
                                        <p class="text-gray-500">{{ Str::limit($ad['description'], 120) }}</p>
                                    </div>
                                    @if($ad['user']['company']['hiring'])
                                        @include('components.badge')
                                    @endif
                                    <div class="flex px-4 py-4 sm:px-6">

                                        <svg class="w-4" fill="bg-gray-500" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg"
                                             aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"></path>
                                        </svg>
                                        <p class="ml-2 text-gray-500 text-sm">Posted {{ $ad['formattedCreatedAt'] }}
                                            ago</p>

                                    </div>
                                </section>
                            </div>
                        @endforeach
                        {{ $ads->links() }}
                    </div>
                    <livewire:ads-content :ads="$ads" :image="$image"/>
                </div>

            @else
                <p class="text-sm text-gray-500">No ads found.</p>
            @endif
        </section>
    </div>

</div>
