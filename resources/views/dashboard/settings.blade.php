@extends('layouts.dashboard.layout')
@section('title', 'Account Settings')
@section('description', 'Update your account settings and preferences.')
@section('keywords', 'account settings, user preferences, update settings')

@section('content')



    @include('components.modal-delete')



    <div class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        @include('layouts.dashboard.secondHeader')


        <!-- Payment details -->
            <div id="main_content" class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <div class="">
                    <section class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">

                        <div class="divide-y divide-gray-200 lg:col-span-12">
                            <!-- Profile section -->

                            <div aria-labelledby="payment-details-heading">
                                <form action="#" method="POST">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="bg-white py-6 px-4 sm:p-6">
                                            <div>
                                                <h1 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Account Information</h1>
                                                <p class="mt-1 text-sm text-gray-500">Update your account password to enhance security. Keeping a strong and unique password helps protect your information and ensures the safety of your account.</p>
                                            </div>

                                            <div class="mt-6 grid grid-cols-4 gap-6">
                                                <div class="col-span-4 sm:col-span-2">
                                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Actual password</label>
                                                    <input type="text" name="first-name" id="first-name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                                </div>

                                                <div class="col-span-4 sm:col-span-2">
                                                    <label for="last-name" class="block text-sm font-medium text-gray-700">New password</label>
                                                    <input type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:indigo-900 focus:border-indigo-900 sm:text-sm">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <x-button type="submit" kind="primary">Save</x-button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <section class="mt-6" aria-labelledby="payment-details-heading">
                                <form action="#" method="POST">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="bg-white py-6 px-4 sm:p-6">
                                            <div>
                                                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Privacy</h2>
                                                <p class="mt-1 text-sm text-gray-500">Update profile visibility.</p>
                                            </div>

                                            <form action="{{route('dashboard.settings.privacy')}}" method="POST">

                                                <div>
                                                    <ul role="list" class="mt-2 divide-y divide-gray-200">
                                                        <li class="py-4 flex items-center justify-between">
                                                            <div class="flex flex-col">
                                                                <p class="text-sm font-medium text-gray-900"
                                                                   id="privacy-option-1-label">Available to hire</p>
                                                                <p class="text-sm text-gray-500"
                                                                   id="privacy-option-1-description">
                                                                    Share your availability for hiring. Let others know you're open for new opportunities.</p>
                                                            </div>
                                                            <button type="button"
                                                                    class="bg-gray-200 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                    role="switch"
                                                                    aria-labelledby="privacy-option-1-label"
                                                                    aria-describedby="privacy-option-1-description">
                                                    <span aria-hidden="true"
                                                          class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                            </button>
                                                        </li>
                                                        <li class="py-4 flex items-center justify-between">
                                                            <div class="flex flex-col">
                                                                <p class="text-sm font-medium text-gray-900"
                                                                   id="privacy-option-2-label">Make account private</p>
                                                                <p class="text-sm text-gray-500"
                                                                   id="privacy-option-2-description">
                                                                    Keep your account details private. Your profile will not be longer visible by the others</p>
                                                            </div>
                                                            <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                                            <button type="button"
                                                                    class="bg-gray-200 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                    role="switch"
                                                                    aria-labelledby="privacy-option-2-label"
                                                                    aria-describedby="privacy-option-2-description">
                                                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                                <span aria-hidden="true"
                                                                      class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                            </button>
                                                        </li>
                                                        <li class="py-4 flex items-center justify-between">
                                                            <div class="flex flex-col">
                                                                <p class="text-sm font-medium text-gray-900"
                                                                   id="privacy-option-3-label">Allow commenting</p>
                                                                <p class="text-sm text-gray-500"
                                                                   id="privacy-option-3-description">
                                                                    Enable comments on your profile.</p>
                                                            </div>
                                                            <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                                            <button type="button"
                                                                    class="bg-gray-200 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                    role="switch"
                                                                    aria-labelledby="privacy-option-3-label"
                                                                    aria-describedby="privacy-option-3-description">
                                                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                                <span aria-hidden="true"
                                                                      class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                            </button>
                                                        </li>
                                                        <li class="py-4 flex items-center justify-between bg-red-50 px-6 -mx-6">
                                                            <div class="flex flex-col">
                                                                <p class="text-sm font-medium text-gray-900"
                                                                   id="privacy-option-3-label">Delete account</p>
                                                                <p class="text-sm text-gray-500"
                                                                   id="privacy-option-3-description">
                                                                    Permanently delete your account. This action cannot be undone.</p>
                                                            </div>
                                                            <x-button id="delete-account" type="submit" kind="danger" name="delete-account">Delete
                                                            </x-button>

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="-mx-6 px-4 py-3 bg-gray-50 text-right sm:px-6 -mb-6 mt-6">
                                                    <x-button type="submit" kind="primary">Save</x-button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>

                    </section>
                </div>

            </div>
        </div>
    </div>



@endsection

    @vite('resources/js/toggle.js')
@section('scripts')
@endsection

