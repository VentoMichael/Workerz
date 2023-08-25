<form wire:submit.prevent="submitForm" action="{{ route('post.sign-up.account') }}" method="post">
    @csrf
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
                            class="@error('username')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror flex rounded-md shadow-sm ring-inset focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workerz.be/workers/</span>
                            <input wire:model="username" value="{{ old('username') }}" type="text" name="username"
                                   id="username" autocomplete="username"
                                   class=" block flex-1 border-0 bg-transparent py-1.5 pl-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="janesmith">
                        </div>
                    </div>
                    @error('username')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="about"
                           class="block text-sm font-medium leading-6 text-gray-900">About</label>
                    <div class="mt-2">
                                    <textarea id="about" wire:model.lazy="about" name="about" rows="3"
                                              class="@error('about')border border-red-500 @else border-0 ring-gray-300 ring-1 @enderror p-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('about') }}</textarea>
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Write a few sentences about
                        yourself.</p>
                    @error('about')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">

                    <label class="block text-sm font-medium leading-6 text-indigo-900" for="avatarUpload">Upload file</label>
                        <div class="relative">
                            @if ($avatarUpload)
                                <button wire:click.lazy="$set('avatarUpload',null)" type="button" class="inset-y-1/2 mt-[-16px] right-3 absolute ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            @endif
                    <input wire:model.lazy="avatarUpload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none" aria-describedby="avatarUpload" id="avatarUpload" type="file">
                        </div>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('avatarUpload')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                </div>

                <div class="col-span-full mt-8">
                    <label for="backgroundUpload" class="block text-sm font-medium leading-6 text-gray-900">Cover
                        photo</label>
                    <div @if($backgroundUpload) style="background-image: url('{{ $backgroundUpload->temporaryUrl() }}'); background-position: center;background-repeat: no-repeat;background-size: cover;" @endif
                        class="@error('$backgroundUpload')border border-red-500 rounded-md @enderror mt-2 flex justify-center rounded-lg border border-dashed relative border-gray-900/25 px-6 py-10">
                        @if($backgroundUpload)
                        <button wire:click.lazy="$set('backgroundUpload',null)" type="button" class="top-2 right-2 absolute ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                         @endif
                        <div class="text-center bg-white p-4 rounded-md">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="backgroundUpload"
                                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input wire:model.lazy="backgroundUpload" id="backgroundUpload"
                                           name="backgroundUpload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG up to 5MB</p>
                        </div>
                    </div>
                    @error('backgroundUpload')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">First
                        name</label>
                    <div class="mt-2">
                        <input wire:model.lazy="firstname" type="text" name="firstname" id="firstname"
                               autocomplete="firstname"
                               class="@error('firstname')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('firstname')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Last
                        name</label>
                    <div class="mt-2">
                        <input wire:model.lazy="lastname" type="text" name="lastname" id="lastname"
                               autocomplete="lastname"
                               class="@error('lastname')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('lastname')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input wire:model.lazy="email" id="email" name="email" type="email"
                               autocomplete="email"
                               class="@error('email')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('email')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password
                    </label>
                    <div class="mt-2">
                        <input wire:model.lazy="password" id="password" name="password" type="password"
                               autocomplete="password"
                               class="@error('password')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="streetAddress" class="block text-sm font-medium leading-6 text-gray-900">Street
                        address</label>
                    <div class="mt-2">
                        <input wire:model.lazy="streetAddress" type="text" name="streetAddress" id="streetAddress"
                               autocomplete="streetAddress"
                               class="@error('streetAddress')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('streetAddress')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input wire:model.lazy="city" type="text" name="city" id="city" autocomplete="city"
                               class="@error('city')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('city')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State /
                        Province</label>
                    <div class="mt-2">
                        <input wire:model.lazy="region" type="text" name="region" id="region"
                               autocomplete="region"
                               class="@error('region')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('region')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="postalCode" class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                        Postal code</label>
                    <div class="mt-2">
                        <input wire:model.lazy="postalCode" type="text" name="postalCode" id="postalCode"
                               autocomplete="postalCode"
                               class="@error('postalCode')border border-red-500 rounded-md @else border-0 ring-gray-300 ring-1 @enderror px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('postalCode')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror

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
                    <div class="@error('pricingPlan')border border-red-500 @enderror relative bg-white rounded-md -space-y-px">
                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label
                            class="rounded-md label_pricing justify-between relative border p-4 flex flex-col cursor-pointer md:pl-4 sm:pr-6 md:flex-row focus:outline-none">
                            <div class="flex items-center text-sm">
                                <input wire:model.lazy="pricingPlan" type="radio" name="pricingPlan" value="Startup"
                                       class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                       aria-labelledby="pricing-plans-0-label"
                                       aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span id="pricing-plans-0-label"
                                      class="pricing-plans-span ml-3 font-medium">Startup</span>
                            </div>
                            <p id="pricing-plans-0-description-0"
                               class="pricing-plans-description inline ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span class="font-medium text_price" data-monthly="{{9.99}}"
                                      data-yearly="{{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}">9,99€ </span><span
                                    class="text_period">/ mo</span>

                                <span>({{number_format(floor((9.99 * 12) * 0.90) + 0.99, 2, ',', '.')}}€ / ye)</span>

                            </p>
                        </label>
                    </div>
                    @error('pricingPlan')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </fieldset>


            </div>

        </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-nav-link href="{{ route('sign-up.role') }}" class="max-w-xs" kind="secondary">Go back</x-nav-link>
        <x-button type="submit" kind="primary" class="max-w-xs disabled:opacity-50">
            Continue to next step
            <svg wire:loading wire:target="submitForm" aria-hidden="true" class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
        </x-button>
    </div>
</form>

@section('scripts')
    <script>
        const radioInputs = document.querySelectorAll('input[name="pricingPlan"]');
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

