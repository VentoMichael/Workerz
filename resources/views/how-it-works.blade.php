@extends('layouts.layout')
@section('title', 'How It Works')
@section('description', 'Discover how Workerz works and get started today. Find out how our platform connects you with the best professionals in Freelance.')
@section('keywords', 'how it works, Workerz, Freelance, get started, platform, professionals, connect')


@section('content')
    <main>
        <div class="relative bg-white overflow-hidden">

            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

                    <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                <span class="block xl:block"> How It Works </span>
                                <span class="block text-indigo-600 xl:inline">The simple guide</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Learn how to use our platform to connect with talented freelancers and find the right
                                services for your needs. Follow these easy steps to start hiring or posting ads
                                today.</p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                                    <a href="{{route('sign-up.role')}}">
                                        <x-button kind="primary-big">Get started</x-button>
                                    </a>
                                    <a href="{{route('how-it-works')}}#steps">
                                        <x-button kind="secondary-big">Learn more</x-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                     src="{{asset('img/pexels-yan-krukau-7793730.jpg')}}"
                     alt="">
            </div>
        </div>

        <section class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8" id="steps">
            <div class="pt-24 pb-12">
                <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Hiring Freelancers and Finding
                    Work</h2>
                <p class="mt-4 max-w-7xl mx-auto text-base text-gray-500">This is a step-by-step guide that explains how
                    to hire freelancers or find work as a freelancer on our platform. Whether you're a business owner
                    looking to outsource tasks or a freelancer searching for projects, this page will help you
                    understand the process and get started quickly.</p>
            </div>
            <div>
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <select id="tabs" name="tabs"
                            class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        <option value="workers">Hire a Freelancer</option>
                        <option value="ads">Post an Ad</option>
                    </select>
                </div>
                <div class="space-x-4 p-4 justify-around grid grid-cols-1 gap-40 sm:grid-cols-2">
                    <!-- Add an "id" attribute to each tab link to match with their corresponding tab content section "id" attribute -->
                    <section>
                        <h2 class="text-3xl font-bold text-gray-800 rounded-md">I am a Freelancer</h2>
                        <ol class="mt-8 pl-8 py-12 relative text-gray-500 border-l border-gray-200">
                            <li class="mb-16 ml-6 text-left">
                            <span class="absolute flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full -left-8 ring-8 ring-white">
                                        <svg aria-hidden="true" class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                                                      d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                                                                      clip-rule="evenodd"></path></svg>
                                    </span>
                                <p class="text-black mb-2 font-medium leading-tight">Create your profile</p>
                                <p class="text-sm">Create a job posting with your project
                                    details and required skills.</p>
                            </li>
                            <li class="mb-16 ml-6 text-left">
        <span
            class="absolute flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full -left-8 ring-8 ring-white">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path
                    fill-rule="evenodd"
                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                    clip-rule="evenodd"></path></svg>
        </span>
                                <p class="text-black mb-2 font-medium leading-tight">Search for job opportunities</p>
                                <p class="text-sm">Freelancers will send you proposals and
                                    you can review their profiles and portfolios.</p>
                            </li>
                            <li class="mb-16 ml-6 text-left">

                            <span
                                class="absolute flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full -left-8 ring-8 ring-white">
                                <svg fill="currentColor" class="w-8 h-8 text-gray-500" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"></path>
                                </svg>
                            </span>
                                <p class="text-black mb-2 font-medium leading-tight">Collaborate with clients</p>
                                <p class="text-sm">Select the freelancer who best fits your
                                    project needs, then work with them through the platform to complete the
                                    project.</p>
                            </li>
                            <li class="ml-6 text-left">

       <span
           class="absolute flex items-center justify-center w-16 h-16 bg-green-200 rounded-full -left-8 ring-8 ring-white">
            <svg aria-hidden="true" class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                          clip-rule="evenodd"></path></svg>
        </span>
                                <p class="text-black mb-2 font-medium leading-tight">Be Ready to Work</p>
                                <p class="text-sm">Prepare yourself for success by getting organized and focused on your
                                    goals.</p>
                            </li>
                        </ol>

                    </section>
                    <section style="margin-left: 0;" class="ml-0">
                        <h2 class="text-3xl font-bold text-gray-800 rounded-md">I need freelance services</h2>

                        <ol class="mt-8 pl-8 py-12 relative text-gray-500 border-l border-gray-200">
                            <li class="mb-16 ml-6 text-left">
                            <span class="absolute flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full -left-8 ring-8 ring-white">
                                        <svg aria-hidden="true" class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                                                      d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                                                                      clip-rule="evenodd"></path></svg>
                                    </span>
                                <p class="text-black mb-2 font-medium leading-tight">Post your job</p>
                                <p class="text-sm">Sign up and fill out your profile with
                                    your skills, experience, and portfolio.</p>
                            </li>
                            <li class="mb-16 ml-6 text-left">
        <span
            class="absolute flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full -left-8 ring-8 ring-white">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path
                    fill-rule="evenodd"
                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                    clip-rule="evenodd"></path></svg>
        </span>
                                <p class="text-black mb-2 font-medium leading-tight">Receive proposals</p>
                                <p class="text-sm">Browse available job postings and apply to
                                    those that fit your expertise.</p>
                            </li>
                            <li class="mb-16 ml-6 text-left">

                            <span
                                class="absolute flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full -left-8 ring-8 ring-white">
                                <svg fill="currentColor" class="w-8 h-8 text-gray-500" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"></path>
                                </svg>
                            </span>
                                <p class="text-black mb-2 font-medium leading-tight">Hire the right freelancer</p>
                                <p class="text-sm">Communicate with potential clients through
                                    the platform, agree on terms, and complete projects.</p>
                            </li>
                            <li class="ml-6 text-left">

       <span
           class="absolute flex items-center justify-center w-16 h-16 bg-green-200 rounded-full -left-8 ring-8 ring-white">
            <svg aria-hidden="true" class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                          clip-rule="evenodd"></path></svg>
        </span>
                                <p class="text-black mb-2 font-medium leading-tight">Get Started Today</p>
                                <p class="text-sm">We hope to help you find the right freelancer for your project, and that your job will be completed to your satisfaction.</p>
                            </li>
                        </ol>

                    </section>
                </div>
            </div>

        </section>

        <!-- CTA Section -->
        <section class="bg-white">
            <div
                class="max-w-4xl mx-auto py-16 px-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Ready to get started?</span>
                    <span
                        class="-mb-1 pb-1 block bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">Get in touch or create an account.</span>
                </h2>
                <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                    <a href="{{route('sign-in')}}">
                        <x-button kind="secondary-big">Sign in</x-button>
                    </a>
                    <a href="{{route('sign-up.role')}}">
                        <x-button kind="primary-big">Sign up</x-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="bg-white" id="faq">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
                <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900">Frequently asked questions</h2>
                        <p class="mt-4 text-lg text-gray-500">Can’t find the answer you’re looking for ? <a
                                href="{{route('contact-us')}}?subject=Technical%20support#form"
                                class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a></p>
                    </div>
                    <dl class="mt-6 space-y-6 divide-y divide-gray-200 col-span-2">
                        <div class="pt-6">
                            <dt class="text-lg">
                                <button type="button"
                                        class="button-title-faq text-left w-full flex justify-between items-start text-gray-400"
                                        aria-controls="faq-0" aria-expanded="false">
                                    <span
                                        class="font-medium text-gray-900"> What is Workerz, and how does it work? </span>
                                    <span class="ml-6 h-7 flex items-center">
                                        <svg class="icon-faq rotate-0 h-6 w-6 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"/>
                                        </svg>
                                      </span>
                                </button>
                            </dt>
                            <dd class="mt-2 hidden pr-12 anwser-faq" id="faq-0">
                                <p class="text-base text-gray-500">Workerz is an online platform that connects
                                    businesses with independent professionals who offer a wide range of services. To use
                                    Workerz, businesses create an account, post their job requirements, and review
                                    proposals from qualified freelancers. They can then select the freelancer who best
                                    meets their needs and work together to complete the project.</p>
                            </dd>
                        </div>
                        <div class="pt-6">
                            <dt class="text-lg">
                                <button type="button"
                                        class="button-title-faq text-left w-full flex justify-between items-start text-gray-400"
                                        aria-controls="faq-0" aria-expanded="false">
                                    <span
                                        class="font-medium text-gray-900"> How do I hire a freelancer on Workerz? </span>
                                    <span class="ml-6 h-7 flex items-center">
                                        <svg class="icon-faq rotate-0 h-6 w-6 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"/>
                                        </svg>
                                      </span>
                                </button>
                            </dt>
                            <dd class="mt-2 hidden pr-12 anwser-faq" id="faq-0">
                                <p class="text-base text-gray-500">To hire a freelancer on Workerz, you first need to
                                    create an account. You can then review proposals from qualified freelancers, compare
                                    their profiles and ratings, and select the one who best meets your needs. Once
                                    you've selected a freelancer, you can communicate with them through Workerz and
                                    collaborate on the project.</p>
                            </dd>
                        </div>
                        <div class="pt-6">
                            <dt class="text-lg">
                                <button type="button"
                                        class="button-title-faq text-left w-full flex justify-between items-start text-gray-400"
                                        aria-controls="faq-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Do I need to pay to post a job ad or browse job ads on your website? </span>
                                    <span class="ml-6 h-7 flex items-center">
                                        <svg class="icon-faq rotate-0 h-6 w-6 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"/>
                                        </svg>
                                      </span>
                                </button>
                            </dt>
                            <dd class="mt-2 hidden pr-12 anwser-faq" id="faq-0">
                                <p class="text-base text-gray-500">No, it is completely free to browse and post job ads
                                    on our website. However, if you are a worker and would like to make your profile
                                    public, there is a small fee to do so. This fee is only applicable to workers who
                                    wish to advertise their skills and services to potential employers.</p>
                            </dd>
                        </div>
                        <div class="pt-6">
                            <dt class="text-lg">
                                <button type="button"
                                        class="button-title-faq text-left w-full flex justify-between items-start text-gray-400"
                                        aria-controls="faq-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> How do I ensure the quality of work on Workerz? </span>
                                    <span class="ml-6 h-7 flex items-center">
                                        <svg class="icon-faq rotate-0 h-6 w-6 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"/>
                                        </svg>
                                      </span>
                                </button>
                            </dt>
                            <dd class="mt-2 hidden pr-12 anwser-faq" id="faq-0">
                                <p class="text-base text-gray-500">Workerz provides several tools to help ensure the
                                    quality of work on the platform. First, you can review a freelancer's profile,
                                    including their ratings and reviews from past clients. You can also communicate with
                                    the freelancer and set clear expectations for the project. Finally, Workerz offers a
                                    dispute resolution process if you're not satisfied with the work or have any issues
                                    with the freelancer.</p>
                            </dd>
                        </div>
                        <div class="pt-6">
                            <dt class="text-lg">
                                <button type="button"
                                        class="button-title-faq text-left w-full flex justify-between items-start text-gray-400"
                                        aria-controls="faq-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> What if I'm not satisfied with the work done by a freelancer? </span>
                                    <span class="ml-6 h-7 flex items-center">
                                        <svg class="icon-faq rotate-0 h-6 w-6 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"/>
                                        </svg>
                                      </span>
                                </button>
                            </dt>
                            <dd class="mt-2 hidden pr-12 anwser-faq" id="faq-0">
                                <p class="text-base text-gray-500">If you're not satisfied with the work done by a
                                    freelancer, you can communicate with them through Workerz to try and resolve the
                                    issue. If that doesn't work, you can initiate the dispute resolution process.
                                    Workerz will review the project and provide a resolution based on the terms of the
                                    agreement between you and the freelancer.</p>
                            </dd>
                        </div>
                        <div class="pt-6">
                            <dt class="text-lg">
                                <button type="button"
                                        class="button-title-faq text-left w-full flex justify-between items-start text-gray-400"
                                        aria-controls="faq-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Is there a free plan available for workers to create a profile on your platform? </span>
                                    <span class="ml-6 h-7 flex items-center">
                                        <svg class="icon-faq rotate-0 h-6 w-6 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"/>
                                        </svg>
                                      </span>
                                </button>
                            </dt>
                            <dd class="mt-2 hidden pr-12 anwser-faq" id="faq-0">
                                <p class="text-base text-gray-500">No, we do not offer a free plan for workers. However,
                                    we have multiple pricing plans available to suit different needs and budgets. Each
                                    plan offers different advantages, such as increased visibility and access to more
                                    job postings. By choosing a paid plan, workers can increase their chances of finding
                                    relevant job opportunities and securing work through our platform. Signing up is
                                    easy, and workers can select the plan that works best for them during the
                                    registration process.</p>
                            </dd>
                        </div>
                    </dl>


                </div>
            </div>
        </section>
    </main>

@endsection
@section('scripts')
    <script>
        const buttons = document.querySelectorAll('.button-title-faq');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.closest('.pt-6').querySelector('.anwser-faq');
                const icon = button.querySelector('.icon-faq');

                answer.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
                icon.classList.toggle('rotate-0');
            });
        });
    </script>
@endsection
