<form action="{{route('sign-up.confirmation')}}">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so
                be careful what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="username"
                           class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workerz.be/workers/</span>
                            <input type="text" name="username" id="username" autocomplete="username"
                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="janesmith">
                        </div>
                    </div>
                    <!-- TODO: Put instant verification -->
                </div>

                <div class="col-span-full">
                    <label for="about"
                           class="block text-sm font-medium leading-6 text-gray-900">About</label>
                    <div class="mt-2">
                                    <textarea id="about" name="about" rows="3"
                                              class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Write a few sentences about
                        yourself.</p>
                </div>

                <div class="col-span-full">
                    <label for="photo"
                           class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="avatar-upload"
                               class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="avatar-upload" name="avatar-upload" type="file" class="sr-only">
                        </label>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover
                        photo</label>
                    <div
                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="background-upload"
                                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="background-upload" name="background-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                        name</label>
                    <div class="mt-2">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last
                        name</label>
                    <div class="mt-2">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password
                    </label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="email"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street
                        address</label>
                    <div class="mt-2">
                        <input type="text" name="street-address" id="street-address"
                               autocomplete="street-address"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input type="text" name="city" id="city" autocomplete="address-level2"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State /
                        Province</label>
                    <div class="mt-2">
                        <input type="text" name="region" id="region" autocomplete="address-level1"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                        Postal code</label>
                    <div class="mt-2">
                        <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                               class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Plans</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important
                changes, but you pick what else you want to hear about.</p>

            <div class="mt-4 space-y-10" id="plans">
                <fieldset>
                    <legend class="sr-only">Pricing plans</legend>
                    <div class="relative bg-white rounded-md -space-y-px">
                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label class="label_pricing bg-indigo-50 border-indigo-200 z-10 justify-between rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                            <div class="flex items-center text-sm">
                                <input type="radio" name="pricing-plan" value="Startup" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
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
                                <input type="radio" name="pricing-plan" value="Business" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-red-500" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
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
                                <input type="radio" name="pricing-plan" value="Enterprise" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-2-label" aria-describedby="pricing-plans-2-description-0 pricing-plans-2-description-1">
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
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-nav-link href="{{ route('sign-up.role') }}" class="max-w-xs" kind="secondary">Go back</x-nav-link>
        <x-button type="submit" class="max-w-xs" kind="primary">Continue to next step</x-button>
    </div>
</form>

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

