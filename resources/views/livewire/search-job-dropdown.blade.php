<div class="mt-10 sm:mt-12">
    <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
        <div class="sm:flex relative">
            <div class="min-w-0 flex-1">
                <label for="name" class="sr-only text-black">Workerz name</label>
                <input wire:model.live.debounce.300ms="search" id="search" type="search"
                       placeholder="Enter the job title you need help with"
                       class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
            </div>
            @if(isset($search))
            <ul class="absolute z-50 overflow-y-auto max-h-24 bg-white border border-gray-300 w-full top-12 rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200">
                @forelse($searchResults as $searchResult)
                    @if(isset($searchResult['trackName']))
                    <li>
                        <a href="#"
                           class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                            <img src="{{ $searchResult['artworkUrl60']}}" alt="" class="w-10">
                            <div class="ml-4 leading-tight">
                                <p class="text-start font-semibold">{{ $searchResult['trackName']  }}</p>
                                <p class="text-start text-gray-600">{{ $searchResult['artistName'] }}</p>
                            </div>
                        </a>
                    </li>
                    @endif
                @empty
                    <li class="py-4 px-4">No results</li>
                @endforelse
            </ul>
            @endif
            <div class="mt-3 sm:mt-0 sm:ml-3">
                <x-button type="submit" class="h-full" kind="primary">Search</x-button>
            </div>
        </div>
    </form>
</div>
