@extends('layouts.layout')
@section('title', 'Pricing Plans for Freelancers')
@section('description', 'Discover the perfect pricing plan for your needs and budget. Choose from our Basic, Premium, and Star plans to unlock exclusive features and benefits for freelancers.')
@section('keywords', 'Workerz, pricing plans, Basic plan, Premium plan, Star plan, exclusive features, freelancers')


@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Choose the Plan That Fits Your
                    Needs</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl">We offer flexible pricing plans designed to meet
                    your unique needs. Whether you're a freelancer looking to showcase your skills or a business owner
                    in need of top-notch talent, our plans provide a range of features and benefits to help you succeed.
                    Choose the plan that's right for you and get started today!</p>
            </div>
            <div class="sm:flex sm:flex-col sm:align-center">
                <label class="relative inline-flex mx-auto mb-4 items-center cursor-pointer">
                    <input type="checkbox" value="" id="annualPrice" class="sr-only peer">
                    <div class="mr-4 w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-200 peer-checked:after:translate-x-full peer-checked:after:border-purple-700 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-purple-700 after:border-purple-700 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-indigo-600 peer-checked:bg-indigo-300"></div>
                    <span class="mr-2 text-sm font-medium text-gray-900">Annual billing </span>
                    <span class="text-sm text-gray-500">(Save 10%)</span>
                </label>
            </div>


            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div
                    class="justify-between flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow xl:p-8">
                    <div>

                        <h3 class="mb-4 text-2xl font-semibold">Starter</h3>
                        <p class="font-light text-gray-500 sm:text-lg">Perfect for those just starting out or looking to
                            test the waters of the platform.</p>
                        <div class="flex justify-center items-baseline my-8">
                            <span class="mr-2 text-5xl font-extrabold text_price" data-monthly="{{9.99}}" data-yearly="{{(9.99 * 12) *.90}}">9,99€</span>
                            <span class="text-gray-500 text_period">/month</span>
                        </div>

                        <!-- List -->
                        <ul role="list" class="mb-8 space-y-4 text-left">
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Profile creation with basic information and skills</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Limited visibility on the platform</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Basic customer support</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Messenger limited to 10 people</span>
                            </li>
                        </ul>
                        <!-- TODO: if connected redirect to settings -->
                    </div>

                    <a href="{{route('sign-up.role')}}">
                        <x-button kind="primary">Get started</x-button>
                    </a>
                </div>
                <div
                    class="justify-between flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border-4 border-purple-700 shadow xl:p-8">
                    <div>
                        <h3 class="mb-4 text-2xl font-semibold text-purple-700">Premium</h3>
                        <p class="font-light text-gray-500 sm:text-lg">Ideal for professionals who want to stand out and
                            take their freelancing career to the next level.</p>
                        <div class="flex justify-center items-baseline my-8">
                            <span class="mr-2 text-5xl font-extrabold text_price" data-monthly="{{19.99}}" data-yearly="{{(19.99 * 12) *.90}}">19,99€</span>
                            <span class="text-gray-500 text_period">/month</span>
                        </div>
                        <!-- List -->
                        <ul role="list" class="mb-8 space-y-4 text-left">
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Profile creation with detailed information and skills</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Higher visibility on the platform</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Dashboard with analytics</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Featured profile</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Personal branding</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Messenger limited to 100 people</span>
                            </li>
                        </ul>
                        <!-- TODO: if connected redirect to settings -->
                    </div>
                    <a href="{{route('sign-up.role')}}">
                        <x-button kind="primary">Get started</x-button>
                    </a>
                </div>
                <div
                    class="justify-between flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow xl:p-8">
                    <div>

                        <h3 class="mb-4 text-2xl font-semibold">Starter</h3>
                        <p class="font-light text-gray-500 sm:text-lg">The ultimate package for serious freelancers who
                            want to dominate the platform and expand their business.</p>
                        <div class="flex justify-center items-baseline my-8">
                            <span class="mr-2 text-5xl font-extrabold text_price" data-monthly="{{29.99}}" data-yearly="{{(29.99 * 12) *.90}}">29,99€</span>
                            <span class="text-gray-500 text_period">/month</span>
                        </div>
                        <!-- List -->
                        <ul role="list" class="mb-8 space-y-4 text-left">
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Profile creation with detailed information and skills</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Maximum visibility on the platform</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Dashboard with advanced analytics</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Featured profile</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Personal branding</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Exclusive job postings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>Messenger unlimited</span>
                            </li>
                        </ul>
                        <!-- TODO: if connected redirect to settings -->
                    </div>
                    <a href="{{route('sign-up.role')}}">
                        <x-button kind="primary">Get started</x-button>
                    </a>

                </div>
            </div>
        </div>
    </section>


<!-- FAQ -->
    @include('layouts.faq')

@endsection
@section('scripts')
    <script>
        const annualPriceCheckbox = document.getElementById('annualPrice');
        const priceElements = document.querySelectorAll('.text_price');
        const periodElement = document.querySelectorAll('.text_period');

        annualPriceCheckbox.addEventListener('click', () => {
            if (annualPriceCheckbox.checked) {
                priceElements.forEach(price => {
                    const monthlyPrice = parseFloat(price.dataset.monthly);
                    const annualPrice = (monthlyPrice * 12) * 0.90;
                    price.textContent = annualPrice.toFixed(2) + '€';
                });
                periodElement.forEach(period => {
                    period.textContent = '/year';
                })
            } else {
                priceElements.forEach(price => {
                    const monthlyPrice = parseFloat(price.dataset.monthly);
                    price.textContent = monthlyPrice.toFixed(2) + '€';
                });

                periodElement.forEach(period => {
                    period.textContent = '/month';
                })
            }
        });









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
