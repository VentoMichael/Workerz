<div class="bg-gray-50">


    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Checkout</h2>

        <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" wire:submit.prevent="createSubscription" action="{{route('post.sign-up.confirmation')}}" method="post">
            @csrf
            <div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                    <div class="mt-4">
                        <label for="email-address" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-1">
                            <input wire:model="email" type="email" id="email-address" name="email-address" autocomplete="email" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="mt-10 border-t border-gray-200 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div>
                            <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-1">
                                <input wire:model="firstname" type="text" id="firstname" name="firstname" autocomplete="firstname" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="mt-1">
                                <input wire:model="lastname" type="text" id="lastname" name="lastname" autocomplete="lastname" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Company</label>
                            <div class="mt-1">
                                <input type="text" wire:model="company" name="company" id="company" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                            <div class="mt-1">
                                <input type="text" wire:model="address" name="address" id="address" autocomplete="street-address" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="apartment" class="block text-sm font-medium leading-6 text-gray-900">Apartment, suite, etc.</label>
                            <div class="mt-1">
                                <input type="text" wire:model="apartment" name="apartment" id="apartment" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>


                        <div>
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                            <div class="mt-1">
                                <input type="text" wire:model="region" name="region" id="region" autocomplete="address-level1" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="postalCode" class="block text-sm font-medium leading-6 text-gray-900">Postal code</label>
                            <div class="mt-1">
                                <input type="text" wire:model="postalCode" name="postalCode" id="postalCode" autocomplete="postalCode" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-1">
                                <input type="text" wire:model="phone" name="phone" id="phone" autocomplete="tel" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment -->
                <div class="mt-10 border-t border-gray-200 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                    <fieldset class="mt-4">
                        <legend class="sr-only">Payment type</legend>
                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                            <div class="flex items-center">
                                <input wire:model="paymentType" id="creditCard" name="paymentType" type="radio" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="creditCard" class="ml-3 block text-sm font-medium leading-6 text-gray-900"> Credit card </label>
                            </div>

                            <div class="flex items-center">
                                <input wire:model="paymentType" id="paypal" name="paymentType" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="paypal" class="ml-3 block text-sm font-medium leading-6 text-gray-900"> PayPal </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                        <div class="col-span-4">
                            <label for="card-number" class="block text-sm font-medium leading-6 text-gray-900">Card number</label>
                            <div class="mt-1">
                                <input wire:model="cardNumber" type="text" id="cardNumber" name="cardNumber" autocomplete="cardNumber" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-4">
                            <label for="name-on-card" class="block text-sm font-medium leading-6 text-gray-900">Name on card</label>
                            <div class="mt-1">
                                <input wire:model="nameOnCard" type="text" id="nameOnCard" name="nameOnCard" autocomplete="nameOnCard" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="expiration-date" class="block text-sm font-medium leading-6 text-gray-900">Expiration date (MM/YY)</label>
                            <div class="mt-1">
                                <input wire:model="expirationDate" type="text" name="expirationDate" id="expirationDate" autocomplete="expirationDate" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="cvc" class="block text-sm font-medium leading-6 text-gray-900">CVC</label>
                            <div class="mt-1">
                                <input wire:model="cvc" type="text" name="cvc" id="cvc" autocomplete="cvc" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order summary -->
            <div class="mt-10 lg:mt-0">
                <div class="md:sticky md:top-4">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li class="flex py-6 px-4 sm:px-6">
                                <div class="flex-shrink-0">
                                    <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                                </div>

                                <div class="ml-6 flex-1 flex flex-col">
                                    <div class="flex">
                                        <div class="min-w-0 flex-1">
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> Basic Tee </a>
                                            </h4>
                                            <p class="mt-1 text-sm text-gray-500">Black</p>
                                            <p class="mt-1 text-sm text-gray-500">Large</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('sign-up.account')}}#plans" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Change plan</a>

                            </li>



                            <!-- More products... -->
                        </ul>
                        <dl class="border-t border-gray-200 pb-6 px-4 space-y-6 sm:px-6">
                            <div class="flex items-center justify-between pt-6">
                                <dt class="text-base font-medium">Total</dt>
                                <dd class="text-base font-medium text-gray-900">$75.52</dd>
                            </div>
                        </dl>

                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <x-button class="w-full" id="submit" kind="primary">Confirm order</x-button>
                        </div>
                    </div></div>
            </div>
        </form>
    </div>
</div>
