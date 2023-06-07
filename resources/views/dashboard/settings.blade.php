@extends('layouts.dashboard.layout')
@section('title', '')
@section('description', '')
@section('keywords', '')

@section('content')

    <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        @include('layouts.dashboard.secondHeader')


        <!-- Payment details -->
            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">

                        <form class="divide-y divide-gray-200 lg:col-span-12" action="#" method="POST">
                            <!-- Profile section -->
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                <div>
                                    <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                                    <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                                </div>
                                <div class="pt-6 divide-y divide-gray-200">
                                    <div class="px-4 sm:px-6">
                                        <div>
                                            <h2 class="text-lg leading-6 font-medium text-gray-900">Privacy</h2>
                                            <p class="mt-1 text-sm text-gray-500">Ornare eu a volutpat eget vulputate. Fringilla commodo amet.</p>
                                        </div>
                                        <ul role="list" class="mt-2 divide-y divide-gray-200">
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900" id="privacy-option-1-label">Available to hire</p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-1-description">Nulla amet tempus sit accumsan. Aliquet turpis sed sit lacinia.</p>
                                                </div>
                                                <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                                <button type="button" class="bg-gray-200 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="true" aria-labelledby="privacy-option-1-label" aria-describedby="privacy-option-1-description">
                                                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                    <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                </button>
                                            </li>
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900" id="privacy-option-2-label">Make account private</p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-2-description">Pharetra morbi dui mi mattis tellus sollicitudin cursus pharetra.</p>
                                                </div>
                                                <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                                <button type="button" class="bg-gray-200 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="false" aria-labelledby="privacy-option-2-label" aria-describedby="privacy-option-2-description">
                                                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                    <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                </button>
                                            </li>
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900" id="privacy-option-3-label">Allow commenting</p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-3-description">Integer amet, nunc hendrerit adipiscing nam. Elementum ame</p>
                                                </div>
                                                <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                                <button type="button" class="bg-gray-200 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="true" aria-labelledby="privacy-option-3-label" aria-describedby="privacy-option-3-description">
                                                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                    <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">

                                        <x-button type="button" kind="secondary">Cancel</x-button>
                                        <x-button type="submit" kind="primary" class="ml-4">Save</x-button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>



@endsection

@section('scripts')

@endsection

