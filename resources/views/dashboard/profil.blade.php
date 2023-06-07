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

                                <div class="mt-6 flex flex-col lg:flex-row">
                                    <div class="flex-grow space-y-6">
                                        <div>
                                            <label for="username" class="block text-sm font-medium text-gray-700"> Username </label>
                                            <div class="mt-1 rounded-md shadow-sm flex border-gray-300 border">
                                                <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 pr-1 inline-flex items-center text-gray-500 sm:text-sm"> workerz.be/ </span>
                                                <input type="text" name="username" id="username" autocomplete="username" class="pl-1 focus:ring-indigo-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" value="deblewis">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="about" class="block text-sm font-medium text-gray-700"> About </label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                                        <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                                        <div class="mt-1 lg:hidden">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                                    <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                                                </div>
                                                <div class="ml-5 rounded-md shadow-sm">
                                                    <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                                        <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                                            <span>Change</span>
                                                            <span class="sr-only"> user photo</span>
                                                        </label>
                                                        <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden relative rounded-full overflow-hidden lg:block">
                                            <img class="relative rounded-full w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                                            <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                                <span>Change</span>
                                                <span class="sr-only"> user photo</span>
                                                <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-12 gap-6">
                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-sky-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="company" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="text" name="company" id="company" autocomplete="organization" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-sky-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Privacy section -->
                            <div class="pt-6 divide-y divide-gray-200">
                                <div class="px-4 sm:px-6">
                                    <div>
                                        <h2 class="text-lg leading-6 font-medium text-gray-900">Realisations</h2>
                                        <p class="mt-1 text-sm text-gray-500">Ornare eu a volutpat eget vulputate. Fringilla commodo amet.</p>
                                    </div>
                                    <ul role="list" class="mt-2 divide-y divide-gray-200">
                                        <li class="py-4 flex items-center justify-between">
                                            <div class="flex flex-col">
                                                <p class="text-sm font-medium text-gray-900" id="privacy-option-1-label">Title of realisation</p>
                                                <p class="text-sm text-gray-500" id="privacy-option-1-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid atque deserunt ducimus eos in incidunt laboriosam minus quam quasi quibusdam reiciendis sapiente similique soluta, tempore temporibus, ut vero voluptas.</p>
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

