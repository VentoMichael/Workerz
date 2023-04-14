@props([
    'href' => '#',
    'kind' => 'primary',
    'colors' => [
        'primary' => 'text-base font-medium text-gray-500 hover:text-gray-900',
        'secondary' => 'block w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900',
        'ternary' => 'text-base text-gray-500 hover:text-gray-900',
    ]
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => $colors[$kind]]) }}> {{ $slot }} </a>
