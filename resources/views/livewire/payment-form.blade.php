<div class="bg-gray-50">


    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Checkout</h2>

        <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" wire:submit.prevent="createSubscription"
              action="{{route('post.sign-up.confirmation')}}" method="post">
            @csrf
            <div>

                <!-- Payment -->
                <div class="mt-10 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Card details</label>
                                <div class="border-0 ring-gray-300 ring-1 px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="card-element"></div>
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
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg"
                                        alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                                </div>

                                <div class="ml-6 flex-1 flex flex-col">
                                    <div class="flex">
                                        <div class="min-w-0 flex-1">
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> Basic
                                                    Tee </a>
                                            </h4>
                                            <p class="mt-1 text-sm text-gray-500">Black</p>
                                            <p class="mt-1 text-sm text-gray-500">Large</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('sign-up.account')}}#plans"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Change plan</a>

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
                            <x-button class="w-full" id="card-button" data-secret="{{ $intentClientSecret }}"
                                      kind="primary">Confirm order
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
