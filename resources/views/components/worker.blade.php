<section class="overflow-visible bg-white shadow overflow-hidden sm:rounded-md relative">


    <livewire:report-worker :worker="$worker"/>


    <a href="{{ route('workers.show',['username']) }}" class="block hover:bg-indigo-50">

        <div class="px-4 pt-4 sm:px-6 grid gap-4 grid-cols-1 sm:grid-cols-48-1">

            <div class="flex-shrink-0 self-center">
                @if(strpos($worker->avatarUpload, 'initials') !== false)
                    <img class="h-12 w-12 rounded-full"
                         src="{{ $worker->avatarUpload . '.svg' }}"
                         alt="Profile Picture of {{ $worker->firstname . $worker->lastname }}"/>
                @else
                    <img class="h-12 w-12 rounded-full"
                         srcset="
                         @foreach($worker->avatarUpload as $imagePath)
                         {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                         @endforeach "
                         src="{{ asset('storage/' . $worker->avatarUpload[0]) }}"
                         alt="Profile Picture of {{ $worker->firstname . $worker->lastname }}"/>
                @endif
            </div>
            <div class="flex justify-between flex-col w-full">

                <div class="flex items-center justify-between">
                    <div>

                        <div class="flex text-sm sm:items-end flex-col sm:flex-row">
                            <h4 class="text-xl font-medium text-indigo-600 truncate">{{ $worker->jobTitle }}</h4>
                            <p class="sm:ml-1 flex-shrink-0 text-md font-normal text-gray-500">
                                &bull; {{ $worker->skill->name }}
                            </p>
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
                            {{ $worker->firstname . $worker->lastname }} | {{ $worker->username }}
                        </p>
                    </div>
                    <div class="mt-2 gap-1 flex flex-col sm:flex-row sm:items-center text-sm text-indigo-500 sm:mt-0">
                        <svg fill="currentColor" class="w-5" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                        </svg>
                        <p class="flex items-center text-sm text-gray-500 sm:mt-0 gap-1">
                            {{ $worker->city }}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col sm:pl-24 px-4 py-4 sm:px-6 flex gap-4">
            <p class="text-gray-500 truncate">{{ $worker->about }}</p>
        </div>
    </a>

</section>

