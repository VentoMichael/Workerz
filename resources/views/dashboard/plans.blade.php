@extends('layouts.dashboard.layout')
@section('title', 'Plans')
@section('description', 'Explore our subscription plans and choose the one that suits your needs.')
@section('keywords', 'subscription plans, pricing, features, choose a plan')


@section('content')

        <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                @include('layouts.dashboard.secondHeader')


                <!-- Payment details -->
                <section id="main_content" class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                    <div aria-labelledby="payment-details-heading">
                        <form action="#" method="POST">
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="bg-white py-6 px-4 sm:p-6">
                                    <div>
                                        <h1 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Payment details</h1>
                                        <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that updating your location could affect your tax rates.</p>
                                    </div>

                                    <div class="mt-6 grid grid-cols-4 gap-6">
                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                            <input type="text" name="first-name" id="first-name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                            <input type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                            <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                        </div>

                                        <div class="col-span-4 sm:col-span-1">
                                            <label for="expiration-date" class="block text-sm font-medium text-gray-700">Expration date</label>
                                            <input type="text" name="expiration-date" id="expiration-date" autocomplete="cc-exp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm" placeholder="MM / YY">
                                        </div>

                                        <div class="col-span-4 sm:col-span-1">
                                            <label for="security-code" class="flex items-center text-sm font-medium text-gray-700">
                                                <span>Security code</span>
                                                <!-- Heroicon name: solid/question-mark-circle -->
                                                <svg class="ml-1 flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                            </label>
                                            <input type="text" name="security-code" id="security-code" autocomplete="cc-csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="city" id="city" autocomplete="city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                        </div>
                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                            <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <x-button type="submit" kind="primary">Save</x-button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Plan -->
                    <section aria-labelledby="plan-heading">
                        <form action="#" method="POST">
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                    <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">You are actually on Business Plan - Annual Billing</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 id="plan-heading" class="text-lg leading-6 font-medium text-gray-900">Plan</h2>
                                    </div>

                                    <div class="mt-4 space-y-10">
                                        <fieldset>
                                            <legend class="sr-only">Pricing plans</legend>
                                            <div class="relative bg-white rounded-md -space-y-px">
                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="label_pricing bg-indigo-50 border-indigo-200 z-10 justify-between rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                                                    <div class="flex items-center text-sm">
                                                        <input type="radio" checked name="pricing-plan" value="Startup" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-0-label">
                                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                        <span id="pricing-plans-0-label" class="pricing-plans-span ml-3 font-medium text-indigo-900">Startup</span>
                                                    </div>
                                                    <p id="pricing-plans-0-description-0" class="pricing-plans-description inline ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                        <span class="font-medium text_price" data-monthly="{{9.99}}" data-yearly="{{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}">9,99€ </span><span class="text_period">/ mo</span>

                                                        <span>({{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}€ / ye)</span>

                                                    </p>
                                                </label>

                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="label_pricing justify-between relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                                                    <div class="flex items-center text-sm">
                                                        <input type="radio" name="pricing-plan" value="Business" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-red-500" aria-labelledby="pricing-plans-1-label">
                                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                        <span id="pricing-plans-1-label" class="pricing-plans-span ml-3 font-medium">Business</span>
                                                    </div>
                                                    <p id="pricing-plans-1-description-0" class="pricing-plans-description inline ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                                        <span class="font-medium text_price" data-monthly="{{9.99}}" data-yearly="{{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}">9,99€ </span><span class="text_period">/ mo</span>

                                                        <span>({{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}€ / ye)</span>
                                                    </p>
                                                </label>

                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="label_pricing rounded-bl-md rounded-br-md justify-between relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                                                    <div class="flex items-center text-sm">
                                                        <input type="radio" name="pricing-plan" value="Enterprise" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-2-label">
                                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                        <span id="pricing-plans-2-label" class="pricing-plans-span ml-3 font-medium">Enterprise</span>
                                                    </div>
                                                    <p id="pricing-plans-2-description-0" class="pricing-plans-description inline ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                                        <span class="font-medium text_price" data-monthly="{{9.99}}" data-yearly="{{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}">9,99€ </span><span class="text_period">/ mo</span>
                                                        <span>({{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}€ / ye)</span>
                                                    </p>
                                                </label>
                                            </div>
                                        </fieldset>

                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <x-button type="submit" kind="primary">I want to change plan</x-button>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Billing history -->
                    <section aria-labelledby="billing-history-heading">
                        <div class="bg-white pt-6 shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 sm:px-6">
                                <h2 id="billing-history-heading" class="text-lg leading-6 font-medium text-gray-900">Billing history</h2>
                            </div>
                            <div class="mt-6 flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-t border-gray-200">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                                    <!--
                                                      `relative` is added here due to a weird bug in Safari that causes `sr-only` headings to introduce overflow on the body on mobile.
                                                    -->
                                                    <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        <span class="sr-only">View receipt</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        <time datetime="2020-01-01">1/1/2020</time>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Business Plan - Annual Billing</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">CA$109.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">View receipt</a>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </main>



@endsection


@vite('resources/js/toggle.js')

@section('scripts')
    <script>
        const radioInputs = document.querySelectorAll('input[name="pricing-plan"]');
        const pricingLabels = document.querySelectorAll('.label_pricing');
        const pricingSpans = document.querySelectorAll('.pricing-plans-span');

        radioInputs.forEach(function(input, index) {
            input.addEventListener('change', function() {
                radioInputs.forEach(function(radio, i) {
                    if (i !== index) {
                        pricingLabels[i].classList.remove('bg-indigo-50', 'border-indigo-200', 'z-10');
                        pricingLabels[i].classList.add('border-gray-200');
                        pricingSpans[i].classList.remove('text-indigo-900');
                        pricingSpans[i].classList.add('text-gray-900');
                    } else {
                        pricingLabels[i].classList.add('bg-indigo-50', 'border-indigo-200', 'z-10');
                        pricingLabels[i].classList.remove('border-gray-200');
                        pricingSpans[i].classList.add('text-indigo-900');
                        pricingSpans[i].classList.remove('text-gray-900');
                    }
                });
            });
        });
    </script>
@endsection


