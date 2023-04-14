@props([
    'href' => '#',
    'kind' => 'primary',
    'colors' => [
        'primary' => 'text-base font-medium text-gray-500 hover:text-gray-900',
        'secondary' => 'font-medium text-indigo-600 hover:text-indigo-500',
        'ternary' => 'text-base text-gray-500 hover:text-gray-900',
    ]
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => $colors[$kind]]) }}> {{ $slot }} </a>
