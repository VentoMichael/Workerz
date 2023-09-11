<div class="border-b border-gray-900/10 pb-12 mt-4 px-6">
    <h2 class="text-base font-semibold leading-7 text-gray-900">Plans</h2>
    <p class="mt-1 text-sm mx-auto leading-6 text-gray-600">We'll always let you know about important
        changes, but you pick what else you want to hear about.</p>

    <div class="mt-4 space-y-10" id="changePlan">
        <form wire:submit="submitForm" method="post">
            <legend class="sr-only">Pricing plans</legend>
            <div x-data="{ annualBilling: false }">
                <div
                    class="@error('plan')border border-red-500 @enderror relative bg-white rounded-md -space-y-px">

                    @foreach($plans as $plan)
                        <label
                            class="label_pricing justify-between relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                            <div class="flex items-center text-sm">
                                <input wire:model.blur="plan" type="radio" name="plan"
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
            <x-button wire:loading.attr="disabled" type="submit" kind="primary" class="max-w-xs disabled:opacity-50">
                Continue to next step
                <svg wire:loading wire:target="submitForm" aria-hidden="true"
                     class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                     viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"/>
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill"/>
                </svg>
            </x-button>
        </form>


    </div>

</div>
@section('scripts')
    <script>
        const radioInputs = document.querySelectorAll('input[name="plan"]');
        const pricingLabels = document.querySelectorAll('.label_pricing');
        const pricingSpans = document.querySelectorAll('.pricing-plans-span');

        radioInputs.forEach(function (input, index) {
            input.addEventListener('change', function () {
                radioInputs.forEach(function (radio, i) {
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
