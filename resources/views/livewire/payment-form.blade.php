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
                            <input disabled value="{{ucfirst($user['firstname']) . ' ' . ucfirst($user['lastname'])}}"
                                   type="text"
                                   name="card-holder-name" id="card-holder-name"
                                   autocomplete="card-holder-name"
                                   class="disabled:opacity-50 disabled:cursor-not-allowed border-0 ring-gray-300 ring-1 px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                    </div>
                    <div class="col-span-full">
                        <label for="card-element" class="block text-sm font-medium leading-6 text-gray-900">Credit or
                            debit card</label>
                        <div wire:model="paymentMethods" wire:ignore id="card-element" name="card-element"
                             class="border-0 ring-gray-300 ring-1 px-2 block w-full rounded-md py-2 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-white"></div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
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
                                        src="{{ $productSelected['image'] }}"
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
                                        <div onclick="Livewire.emit('openModal', 'change-plans')"
                                             class="cursor-pointer text-blue-300 hover:underline">Change plan
                                        </div>
                                    </div>

                                    <div class="space-y-6 sm:pl-6">
                                        <div class="flex items-center justify-between pt-6">
                                            <dt class="text-base font-medium">Total</dt>
                                            <dd class="text-base font-medium text-gray-900">
                                                <span wire:model="planPayment">{{$planPayment}}</span>€ {{$yearlyPayment ? '/yearly' : '/monthly'}}
                                        </div>
                                    </div>
                                </div>

                            </li>


                            <!-- More products... -->
                        </ul>


                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <x-button class="w-full" id="card-button" data-secret="{{ $intent->client_secret }}"
                                      kind="primary">Confirm order
                                <svg id="loading-svg" aria-hidden="true" class="hidden inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
