<section class="overflow-visible bg-white shadow overflow-hidden sm:rounded-md relative">


    <livewire:report-worker :worker="$worker"/>


    <a href="{{ route('workers.show',['name' => $worker->company->name]) }}" class="block hover:bg-indigo-50">

        <div class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 sm:grid-cols-48-1 relative">

            <div class="flex-shrink-0 self-center">
                @if(!is_array($worker->company->logoUpload) && strpos($worker->company->logoUpload, 'initials') !== false)
                    <img class="h-12 w-12 rounded-full"
                         src="{{ $worker->company->logoUpload . '.svg' }}"
                         alt="Profile Picture of {{ $worker->firstname . $worker->lastname }}"/>
                @else
                    <img class="h-12 w-12 rounded-full"
                         srcset="
                         @foreach($worker->company->logoUpload as $imagePath)
                         {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                         @endforeach "
                         src="{{ asset('storage/' . $worker->company->logoUpload[0]) }}"
                         alt="Profile Picture of {{ $worker->firstname . $worker->lastname }}"/>
                @endif
            </div>
            <div class="flex justify-between flex-col w-full">

                <div class="flex items-center justify-between">
                    <div>

                        <div class="flex text-sm sm:items-end sm:flex-row gap-1 items-end relative">
                            <h4 class="text-xl font-medium text-indigo-600 truncate">{{ $worker->company->jobTitle }}</h4>
                            <span class="sm:ml-1 flex-shrink-0 text-md font-normal text-gray-500">&bull; {{ $worker->company->skill->name }}
                            </span>
                            <div class="absolute -top-2 -right-10 flex items-center">
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <p class="ml-1 text-xs font-bold text-gray-900">4.95</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex gap-6 sm:mt-2">
                    <div class="mt-2 gap-1 flex flex-col sm:flex-row sm:items-center text-sm text-indigo-500 sm:mt-0">
                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"></path>
                        </svg>
                        <p class="flex items-center text-sm text-gray-500 sm:mt-0">
                            {{ $worker->firstname . $worker->lastname }} | {{ $worker->company->name }}
                        </p>
                    </div>
                    <div class="mt-2 gap-1 flex flex-col sm:flex-row sm:items-center text-sm text-indigo-500 sm:mt-0">
                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                        </svg>
                        <p class="flex items-center text-sm text-gray-500 sm:mt-0 gap-1">
                            @foreach($worker->company->regions as $index => $region)
                                <span>{{ $region->name }}@if($index < count($worker->company->regions) - 1),@endif</span>
                            @endforeach
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col sm:pl-24 px-4 py-4 sm:px-6 flex gap-4">
            <p class="text-gray-500 truncate">{{ $worker->company->about }}</p>
        </div>
    </a>

</section>

