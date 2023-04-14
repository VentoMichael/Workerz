@extends('layouts.layout')
@section('title', 'Contact Us')
@section('description', 'Contact us to learn more about our platform and how we can help you find and hire independent workers for your needs. Get in touch today!')
@section('keywords', 'contact us, Workerz, independent workers, hire workers, find workers, job postings, small businesses, services, products, ads')


@section('content')
    <section class="bg-white">
        <!-- Header -->
        <div class="relative bg-gray-800 pb-32">
            <div class="absolute inset-0">
                <img class="w-full h-full object-cover"
                     src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100"
                     alt="">
                <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
            </div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Contact us</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-300">Get in touch with Workerz through our contact form or
                    email. We're here to answer any questions you have about our services or provide support for any
                    issues you may be experiencing. Don't hesitate to reach out to us.</p>
            </div>
        </div>
        <section class="bg-gray-100">
            <div class="-mt-32 max-w-md mx-auto relative z-10 px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8"
                     aria-labelledby="contact-heading">
                <h2 class="sr-only" id="contact-heading">Connect with Us</h2>
                <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">

                    <section class="flex flex-col bg-white rounded-2xl shadow-xl">
                        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                            <div
                                class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                <!-- Heroicon name: outline/support -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-blue-gray-900">Technical Support</h3>
                            <p class="mt-4 text-base text-blue-gray-500">Our technical support team is available to
                                assist you with any issues you may encounter while using our products or services. We
                                are committed to providing prompt and effective solutions to ensure your
                                satisfaction.</p>
                        </div>
                        <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                            <a href="{{route('contact-us')}}?subject=Technical%20support#form"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </section>

                    <section class="flex flex-col bg-white rounded-2xl shadow-xl">
                        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                            <div
                                class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                <!-- Heroicon name: outline/newspaper -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-blue-gray-900">Media Inquiries</h3>
                            <p class="mt-4 text-base text-blue-gray-500">For media inquiries or interview requests,
                                please contact our press team. We are always happy to discuss our company and our
                                mission with journalists and media outlets.</p>
                        </div>
                        <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                            <a href="{{route('contact-us')}}?subject=Media%20inquiries#form"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </section>
                    <section class="flex flex-col bg-white rounded-2xl shadow-xl">
                        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                            <div
                                class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                <!-- Heroicon name: outline/phone -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-blue-gray-900">Partnership Opportunities</h3>
                            <p class="mt-4 text-base text-blue-gray-500">We are open to exploring partnership
                                opportunities with companies and organizations that share our values and goals. If you
                                are interested in partnering with us, please reach out to our partnership team for more
                                information.</p>
                        </div>
                        <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                            <a href="{{route('contact-us')}}?subject=Partnership%20opportunities#form"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-800">Contact us<span
                                    aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </section>
                </div>
            </div>

            <div class="mt-8">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md" id="form">
                    <form action="#" class="space-y-8">
                        <!-- TODO: add error handling for form submission -->
                        <!-- TODO: add automatically the email if connected -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" id="email" name="email"
                                   class="placeholder:text-gray-400 shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                   placeholder="your-email@hotmail.com" required>
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                            <input type="text" id="subject" name="subject" value="{{ request('subject') }}"
                                   class="placeholder:text-gray-400 block p-3 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                   placeholder="Let us know how we can help you" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your
                                message</label>
                            <textarea id="message" name="message" rows="6"
                                      class="placeholder:text-gray-400 block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                                      placeholder="Leave a message..."></textarea>
                        </div>
                        <div class="sm:w-fit">
                            <x-button type="submit" kind="primary">Send message</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- FAQ -->
        <!-- This example requires Tailwind CSS v2.0+ -->
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
    </section>

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
