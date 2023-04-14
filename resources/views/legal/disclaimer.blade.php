@extends('layouts.layout')
@section('title', 'Our Disclaimer Policy')
@section('description', 'This Disclaimer page outlines the limitations of liability and disclaimers of warranties for Workerz website, '. config('app.url') . ' By using our website, you accept this disclaimer in full. If you disagree with any part of this disclaimer, do not use our website')
@section('keywords', 'Disclaimer, Limitations of Liability, Disclaimers of Warranties, workerz,' . config('app.url'))

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
                <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Our Disclaimer Policy</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-300">
                    The Workerz Disclaimer Policy outlines the limitations of liability and the use of information on our website, {{ config('app.urlNoHttp') }}. By accessing or using our website, you acknowledge and accept the terms and conditions of this disclaimer policy. If you have any questions or concerns about this policy, please do not hesitate to contact us.
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-16">

            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Disclaimer Policy for Workerz
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    If you require any more information or have any questions about our site's disclaimer, please feel free to contact us by email at <a class="font-medium text-blue-600 underline hover:no-underline" href="mailto:{{config('app.supportEmail')}}">{{config('app.supportEmail')}}</a>.
                </p>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    All the information on this website - {{ config('app.urlNoHttp') }} - is published in good faith and for general information purpose only. Workerz does not make any warranties about the completeness, reliability, and accuracy of this information. Any action you take upon the information you find on this website (Workerz), is strictly at your own risk. Workerz will not be liable for any losses and/or damages in connection with the use of our website.
                </p>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    From our website, you can visit other websites by following hyperlinks to such external sites. While we strive to provide only quality links to useful and ethical websites, we have no control over the content and nature of these sites. These links to other websites do not imply a recommendation for all the content found on these sites. Site owners and content may change without notice and may occur before we have the opportunity to remove a link that may have gone 'bad'.
                </p>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    Please be also aware that when you leave our website, other sites may have different privacy policies and terms that are beyond our control. Please be sure to check the Privacy Policies of these sites as well as their "Terms of Service" before engaging in any business or uploading any information.
                </p>
            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Consent
                </h2>
                    <p class="mb-3 text-gray-600 mb-8 mt-2">
                        By using our website, you hereby consent to our disclaimer and agree to its terms.
                    </p>

            </section>
            <section>
                <h2 class="text-4xl font-bold dark:text-black">
                    Update
                </h2>
                <p class="mb-3 text-gray-600 mb-8 mt-2">
                    This site disclaimer was last updated on 20/05/2023. Should we update, amend or make any changes to this document, those changes will be prominently posted here.
                </p>
            </section>
        </div>
    </div>
    </section>



@endsection
