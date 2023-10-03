<nav aria-label="Page navigation example">
    <ul class="flex items-center -space-x-px h-8 text-sm">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled opacity-50 cursor-not-allowed" aria-disabled="true">
                <span
                    class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg">
                    <span class="sr-only">Previous</span>
                    <svg class="w-3 h-3 text-purple-500" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                    </svg>
                </span>
            </li>
        @else
            <li>
                <a wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                   dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" rel="prev"
                   class="cursor-pointer flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg class="w-3 h-3 text-purple-500" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                    </svg>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page">
                            <span
                                class="cursor-pointer z-10 flex items-center justify-center px-3 h-8 leading-tight text-purple-600 bg-purple-50 border border-purple-300 hover:bg-purple-100">
                                {{ $page }}
                            </span>
                        </li>
                    @elseif($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                        <li wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                            <a wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                               class="cursor-pointer flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                   dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                   rel="next"
                   class="cursor-pointer flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Next</span>
                    <svg class="w-3 h-3 text-purple-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                    </svg>
                </a>
            </li>
        @else
            <li class="disabled opacity-50 cursor-not-allowed" aria-disabled="true">
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg">
                    <span class="sr-only">Next</span>
                    <svg class="w-3 h-3 text-purple-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
  </svg>
                </span>
            </li>
        @endif
    </ul>
</nav>
