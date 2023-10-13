<div x-data="{ showMessage: @if($successMessage || $errorMessage || $infoMessage) true @else false @endif }">
    @if($successMessage)
        <div x-show="showMessage">
            @include('components.success-message', ['message' => $successMessage,'clearProperty' => 'successMessage'])
        </div>
    @endif

    @if($errorMessage)
        <div x-show="showMessage">
            @include('components.error-message', ['message' => $errorMessage,'clearProperty' => 'errorMessage'])
        </div>
    @endif
    @if($infoMessage)
        <div x-show="showMessage">
            @include('components.info-message', ['message' => $infoMessage,'clearProperty' => 'infoMessage'])
        </div>
    @endif
<!-- Profile section -->

    <section class="mt-6" aria-labelledby="payment-details-heading">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
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

                                <x-button onclick="Livewire.dispatch('openModal', { component: 'confirm-delete' })"
                                          kind="danger"
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
