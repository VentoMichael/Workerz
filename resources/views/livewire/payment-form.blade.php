<div class="bg-gray-50">


    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Checkout</h2>

        <form id="subscribe-form" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16"
              action="{{route('post.sign-up.confirmation')}}" method="post">
            @csrf
            <div>

                <!-- Payment -->
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <h2 class="text-lg font-medium text-gray-900">Payment</h2>
                    <div class="col-span-full">
                        <label for="card-holder-name" class="block text-sm font-medium leading-6 text-gray-900">Card
                            Holder Name</label>
                        <div class="mt-2">
                            <input value="{{$user['firstname'] . ' ' . $user['lastname']}}" disabled type="text"
                                   name="card-holder-name" id="card-holder-name"
                                   autocomplete="card-holder-name"
                                   class="border-0 ring-gray-300 ring-1 px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                    </div>
                    <div class="col-span-full">
                        <label for="card-element" class="block text-sm font-medium leading-6 text-gray-900">Credit or
                            debit card</label>
                        <div id="card-element"
                             class="border-0 ring-gray-300 ring-1 px-2 block w-full rounded-md py-2 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-white"></div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
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
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg"
                                        alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="flex justify-between mb-auto">
                                        <div class="ml-6 flex-1 flex flex-col">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <h4 class="font-medium text-gray-700 hover:text-gray-800">{{ $productSelected['name'] }}
                                                        - plan
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="text-blue-300 hover:underline" name="changePlan">Change plan</button>
                                    </div>

                                    <div class="space-y-6 sm:pl-6">
                                        <div class="flex items-center justify-between pt-6">
                                            <dt class="text-base font-medium">Total</dt>
                                            <dd class="text-base font-medium text-gray-900">{{$planPayment}}€</dd>
                                        </div>
                                    </div>
                                </div>

                            </li>


                            <!-- More products... -->
                        </ul>


                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <x-button class="w-full" id="card-button" data-secret="{{ $intent->client_secret }}"
                                      kind="primary">Confirm order
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
