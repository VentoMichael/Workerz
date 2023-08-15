<section class="bg-white my-12">
    <div
        class="max-w-7xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 mx-auto my-24 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Ready to get started?</span>
            <span
                class="-mb-1 pb-1 block bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">Get in touch or create an account.</span>
        </h2>
        <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-4 space-x-2">
            <a href="{{route('how-it-works')}}">
                <x-button kind="secondary">Learn more</x-button>
            </a>
            <a href="{{route('sign-up.role')}}">
                <x-button kind="primary">Get started</x-button>
            </a>
        </div>
    </div>
</section>
