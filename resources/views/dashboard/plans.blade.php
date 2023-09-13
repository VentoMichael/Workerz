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

                    <!-- Plan -->
                    <section aria-labelledby="plan-heading">
                        <form action="#" method="POST">
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                    <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">You're currently on the {{ $matchedPlan }} Plan with {{ $interval }} billing, next payment due on {{ $lastDay }}.</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 id="plan-heading" class="text-lg leading-6 font-medium text-gray-900">Plan</h2>
                                    </div>

                                    <div class="mt-4 space-y-10" id="changePlan">
                                        <fieldset>
                                            <legend class="sr-only">Pricing plans</legend>
                                            <div x-data="{ annualBilling: false }">
                                                <div
                                                    class="@error('plan')border border-red-500 @enderror relative bg-white rounded-md -space-y-px">

                                                    @foreach($plans as $plan)
                                                        <label
                                                            class="label_pricing justify-between relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                                                            <div class="flex items-center text-sm">
                                                                <input @if ($subscription->name === $plan->name) checked @endif wire:model.blur="plan" type="radio" name="plan"
                                                                       value="{{ $plan->name }}"
                                                                       class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                                                       aria-labelledby="pricing-plans-0-label"
                                                                       aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                                                <span id="pricing-plans-0-label"
                                                                      class="pricing-plans-span ml-3 font-medium">{{ $plan->name }}</span>
                                                            </div>
                                                            <template x-if="annualBilling">
                                                                <p x-cloak class="font-medium text_price">
                                                                    {{ $plan->price_yearly }}€
                                                                    <span class="text-gray-500">/yearly</span>
                                                                </p>
                                                            </template>
                                                            <template x-if="!annualBilling">
                                                                <p x-cloak class="font-medium text_price">
                                                                    {{ $plan->price_monthly }}€
                                                                    <span class="text-gray-500">/monthly</span>
                                                                </p>
                                                            </template>

                                                        </label>
                                                    @endforeach

                                                </div>

                                                <div class="flex">
                                                    @error('plan')
                                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                                    @enderror
                                                    <label class="relative ml-auto mt-4 inline-flex mb-4 items-center cursor-pointer">
                                                        <input wire:click="toggleAnnualBilling()" type="checkbox" x-model="annualBilling" name="annualBilling" class="sr-only peer">
                                                        <div
                                                            class="mr-4 w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-200 peer-checked:after:translate-x-full peer-checked:after:border-purple-700 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-purple-700 after:border-purple-700 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-indigo-600 peer-checked:bg-indigo-300"></div>
                                                        <span class="mr-2 text-sm font-medium text-gray-900">Annual billing </span>
                                                        <span class="text-sm text-gray-500">(Save 10%)</span>
                                                    </label>
                                                </div>
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
                                                @foreach ($invoices as $invoice)
                                                    {{-- Loop through line items --}}
                                                    @foreach ($invoice->lines->data as $lineItem)
                                                        {{-- Check if it's a subscription line item --}}
                                                        @if ($lineItem->object === 'line_item' && $lineItem->type === 'subscription')
                                                            {{-- Display plan name and billing interval --}}
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    <time datetime="{{ $invoice->created }}" class="whitespace-nowrap">{{ date('d-m-Y', $invoice->created) }}</time>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">name - {{ $lineItem->plan->interval === 'month' ? 'Monthly':'Yearly' }} billing</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $invoice->total / 100 }} €</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                    <a href="{{ $invoice->hosted_invoice_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">View invoice</a>
                                                                </td>
                                                            </tr>

                                                        @endif
                                                    @endforeach
                                                @endforeach

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


