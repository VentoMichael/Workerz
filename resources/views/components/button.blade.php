@props([
    'kind'=>'primary',
    'colors' => [
        'primary' => 'whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700',
        'primary-big' => 'w-full h-full whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-8 py-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700',
        'secondary' => 'h-full whitespace-nowrap inline-flex items-center justify-center text-indigo-800 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium bg-indigo-50 hover:bg-indigo-100',
        'secondary-big' => 'w-full h-full whitespace-nowrap inline-flex items-center justify-center text-indigo-800 bg-origin-border px-8 py-4 border border-transparent rounded-md shadow-sm text-base font-medium bg-indigo-50 hover:bg-indigo-100',
        'ternary' => 'whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900',
    ]
])

<button {{ isset($attributes['type']) && $attributes['type'] === 'submit' ? 'type='.$attributes['type'] : '' }} {{ $attributes->merge(['class' =>"$colors[$kind]"])}}> {{ $slot }} </button>
