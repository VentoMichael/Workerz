<div class="divide-y divide-gray-200 lg:col-span-12">
    <!-- Profile section -->
    <div aria-labelledby="payment-details-heading">
        <form wire:submit="updatePassword" action="{{ route('password.update') }}" method="POST">
            @csrf
            @include('components.success-message', ['message' => $successMessagePassword,'clearProperty' => 'successMessagePassword'])

            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h1 id="payment-details-heading"
                            class="text-lg leading-6 font-medium text-gray-900">Account
                            Information</h1>
                        <p class="mt-1 text-sm text-gray-500">Update your account password to
                            enhance security. Keeping a strong and unique password helps protect
                            your information and ensures the safety of your account.</p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                            <label for="currentPassword" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <div class="relative">
                            <input type="{{ $passwordVisible ? 'text' : 'password' }}" wire:model.live="currentPassword"
                                   id="currentPassword" autocomplete="currentPassword"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                <div wire:click="togglePasswordVisibility"
                                     class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                                    @if ($passwordVisible)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="eye" height="1em" viewBox="0 0 576 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>.eye {
                                                    fill: #5850ec
                                                }</style>
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="eye" height="1em" viewBox="0 0 640 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>.eye {
                                                    fill: #5850ec
                                                }</style>
                                            <path
                                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            @error('currentPassword')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            <label for="newPassword" class="block text-sm font-medium text-gray-700">New
                                Password</label>
                            <div class="relative">
                                <input type="{{ $newPasswordVisible ? 'text' : 'password' }}" wire:model.live="newPassword"
                                       id="newPassword" autocomplete="newPassword"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                <div wire:click="toggleNewPasswordVisibility"
                                     class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                                    @if ($newPasswordVisible)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="eye" height="1em" viewBox="0 0 576 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                .eye {
                                                    fill: #5850ec
                                                }</style>
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="eye" height="1em" viewBox="0 0 640 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                .eye {
                                                    fill: #5850ec
                                                }</style>
                                            <path
                                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            @error('newPassword')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <x-button wire:click="updatePassword" type="submit" kind="primary">Save</x-button>
                </div>
            </div>
        </form>
    </div>
    <section class="mt-6" aria-labelledby="payment-details-heading">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                @include('components.success-message', ['message' => $successMessage,'clearProperty' => 'successMessage'])
                @include('components.info-message', ['message' => $infoMessage,'clearProperty' => 'infoMessage'])
                <div>
                    <h2 id="payment-details-heading"
                        class="text-lg leading-6 font-medium text-gray-900">Privacy</h2>
                    <p class="mt-1 text-sm text-gray-500">Update profile visibility.</p>
                </div>
                <form wire:submit="submitForm" method="POST">
                    @csrf
                    <div>
                        <ul role="list" class="mt-2 divide-y divide-gray-200">
                            <li class="py-4 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <p class="text-sm font-medium text-gray-900"
                                       id="privacy-option-1-label">Available to hire</p>
                                    <p class="text-sm text-gray-500"
                                       id="privacy-option-1-description">
                                        Share your availability for hiring. Let others know
                                        you're open for new opportunities.
                                    </p>
                                </div>
                                <button wire:click="toggleHiring"
                                        type="button"
                                        wire:class="{ 'bg-indigo-500': hiring, 'bg-gray-200': !hiring }"
                                        class="@if($hiring) bg-indigo-500 @else bg-gray-200 @endif ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        role="switch"
                                        aria-checked="{{ $hiring ? 'true' : 'false' }}"
                                        aria-labelledby="privacy-option-1-label"
                                        aria-describedby="privacy-option-1-description">
                <span aria-hidden="true"
                      wire:class="{ '': hiring, 'translate-x-0': !hiring }"
                      class="@if($hiring) translate-x-5 @else translate-x-0 @endif inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                </button>
                            </li>
                            <li class="py-4 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <p class="text-sm font-medium text-gray-900"
                                       id="privacy-option-2-label">Make account private</p>
                                    <p class="text-sm text-gray-500"
                                       id="privacy-option-2-description">
                                        Keep your account details private. Your profile will
                                        not be longer visible by others.
                                    </p>
                                </div>
                                <div wire:click="togglePrivate"
                                     class="@if($private) bg-indigo-500 @else bg-gray-200 @endif ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                     role="switch"
                                     aria-labelledby="privacy-option-2-label"
                                     aria-describedby="privacy-option-2-description">
                <span aria-hidden="true"
                      class="@if($private) translate-x-5 @else translate-x-0 @endif inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 {{ $private ? 'translate-x-5 bg-indigo-500' : 'translate-x-0 bg-gray-200' }}"></span>
                                </div>
                            </li>

                            <li class="py-4 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <p class="text-sm font-medium text-gray-900"
                                       id="privacy-option-3-label">Allow commenting</p>
                                    <p class="text-sm text-gray-500"
                                       id="privacy-option-3-description">
                                        Enable comments on your profile.
                                    </p>
                                </div>
                                <div wire:click="toggleAllowCommenting"
                                     class="@if($allowCommenting) bg-indigo-500 @else bg-gray-200 @endif ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                     role="switch"
                                     aria-labelledby="privacy-option-3-label"
                                     aria-describedby="privacy-option-3-description">
                <span aria-hidden="true"
                      class="@if($allowCommenting) translate-x-5 @else translate-x-0 @endif inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 {{ $allowCommenting ? 'translate-x-5 bg-indigo-500' : 'translate-x-0 bg-gray-200' }}"></span>
                                </div>
                            </li>

                            <li class="py-4 flex items-center justify-between bg-red-50 px-6 -mx-6">
                                <div class="flex flex-col">
                                    <p class="text-sm font-medium text-gray-900"
                                       id="privacy-option-3-label">Delete account</p>
                                    <p class="text-sm text-gray-500"
                                       id="privacy-option-3-description">
                                        Permanently delete your account. This action cannot
                                        be undone.</p>
                                </div>
                                <!-- Delete Button -->

                                <x-button onclick="Livewire.dispatch('openModal', { component: 'confirm-delete' })" kind="danger"
                                          class="disabled:opacity-50" wire:loading.attr="disabled"
                                          wire:target="deleteAccount" wire:click="deleteBtn">
                                    Delete
                                    <svg wire:loading wire:target="confirmDelete" aria-hidden="true"
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
                            </li>
                        </ul>
                    </div>
                    <div class="-mx-6 px-4 py-3 bg-gray-50 text-right sm:px-6 -mb-6 mt-6">

                        <x-button wire:click="$set('saveLoading',true)" type="submit" kind="primary"
                                  class="disabled:opacity-50">
                            Save
                            @if($saveLoading)
                                <svg wire:target="dubmitForm" wire:loading aria-hidden="true"
                                     class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                                     viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill"/>
                                </svg>
                            @endif
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>
@section('scripts')

    @livewire('wire-elements-modal')

@endsection
