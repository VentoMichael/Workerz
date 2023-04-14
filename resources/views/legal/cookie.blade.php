@extends('layouts.layout')
@section('title', 'Our Cookie Policy')
@section('description', 'Learn about how Workerz uses cookies and similar tracking technologies on our website to enhance your browsing experience. Read our Cookie Policy for more information.')
@section('keywords', 'cookies, tracking technologies, website, privacy, data, analytics, preferences, user experience, consent')


@section('content')
    <section class="bg-white">
        <div class="relative bg-gray-800">
            <div class="absolute inset-0">
                <img class="w-full h-full object-cover"
                     src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100"
                     alt="">
                <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
            </div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Our Cookie Policy</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-300">This Cookie Policy explains how we use cookies and similar tracking technologies when you visit our website,
                    {{ config('app.urlNoHttp') }}. By using our website, you consent to our use of cookies as described in this policy. If you have any questions or concerns about our use of cookies, please <a class="font-medium text-blue-400 underline hover:no-underline" href="mailto:{{config('app.supportEmail')}}">contact us</a>.</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-16">

            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Cookie Policy for Workerz
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    This is the Cookie Policy for Workerz, accessible from {{ config('app.urlNoHttp') }}, and it explains how we use cookies and similar technologies on our website.
                </p>
            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    What are cookies?
                </h2>
                    <p class="mb-3 text-gray-600 mb-8 mt-2">
                        Cookies are small text files that are stored on your device when you visit a website. They help us to enhance your user experience on our website by remembering your preferences and actions, such as login details or language selection.
                    </p>

            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Why do we use cookies?
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    We use cookies to improve your browsing experience, personalize content, analyze traffic, and understand how our website is being used. Cookies also help us to provide you with relevant advertising based on your interests and behavior on our website.
                </p>
                <section>

                <h3 class="mb-3 text-gray-600 mb-8 mt-2">
                    What types of cookies do we use?
                </h3>
                <p class="mb-3 text-gray-600 mb-2 mt-2">
                    There are different types of cookies that we use on our website:
                </p>


                <ul class="max-w-xl space-y-1 list-disc list-inside text-gray-600 mb-6">
                    <li class="ml-4">
                        Essential cookies: These are necessary cookies that enable you to use our website and its features, such as accessing secure areas of the site or remembering items in your shopping cart.
                    </li>
                    <li class="ml-4">
                        Performance cookies: These cookies help us to improve the performance and functionality of our website by collecting information about how visitors use our site, such as which pages are frequently visited and any errors that may occur.
                    </li>
                    <li class="ml-4">
                        Analytics cookies: We use these cookies to track and analyze user behavior on our website, such as how long they spend on the site and what pages they visit. This helps us to understand how users interact with our site and make improvements accordingly.
                    </li>
                    <li class="ml-4">
                        Advertising cookies: These cookies help us to provide you with relevant advertising based on your interests and behavior on our website.
                    </li>
                </ul>
                </section>

            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    How to manage cookies?
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    You can manage or delete cookies at any time using your browser settings. However, please note that disabling cookies may affect your user experience on our website and limit some of its features.
                </p>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    Most web browsers allow you to control cookies through their settings. To learn more about cookie management with specific web browsers, you can visit the respective browser's website:
                </p>
                <ul class="max-w-lg space-y-1 list-disc list-inside text-gray-600 mb-6">
                    <li class="ml-4">
                        <a class="font-medium text-blue-600 underline hover:no-underline" href="https://support.google.com/chrome/answer/95647">Google Chrome</a>
                    </li>
                    <li class="ml-4">
                        <a class="font-medium text-blue-600 underline hover:no-underline" href="https://support.mozilla.org/en-US/kb/delete-cookies-remove-info-websites-stored">Mozilla Firefox</a>
                    </li>
                    <li class="ml-4">
                        <a class="font-medium text-blue-600 underline hover:no-underline" href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac">Safari</a>
                    </li>
                    <li class="ml-4">
                        <a class="font-medium text-blue-600 underline hover:no-underline" href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09">Microsoft Edge</a>
                    </li>
                </ul>
            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Changes to our Cookie Policy
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    We may update our Cookie Policy from time to time. Any changes will be posted on this page with an updated revision date. We encourage you to review this Cookie Policy periodically to stay informed about our use of cookies on our website.
                </p>
            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Contact Us
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    If you have any questions or concerns about our Cookie Policy, please <a class="font-medium text-blue-600 underline hover:no-underline" href="mailto:{{config('app.supportEmail')}}">contact us</a>.
                </p>
            </section>

        </div>
    </div>
    </section>



@endsection
