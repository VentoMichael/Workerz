@extends('layouts.dashboard.layout')
@section('title', 'My Profile')
@section('description', 'Manage your profile information and settings.')
@section('keywords', 'profile, user settings, manage profile')

@section('content')

    <div class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <section class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            @include('layouts.dashboard.secondHeader')

            <div id="main_content" class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <!-- Payment details -->
                <div>

                    <form action="#" method="POST">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                <div>
                                    <h1 class="text-lg leading-6 font-medium text-gray-900">Profile</h1>
                                    <p class="mt-1 text-sm text-gray-500">This information will be displayed
                                        publicly so
                                        be careful what you share.</p>
                                </div>

                                <div class="mt-6 flex flex-col lg:flex-row">
                                    <div class="flex-grow space-y-6">
                                        <div class="sm:col-span-4">
                                            <label for="username"
                                                   class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                                    <span
                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workerz.be/workers/</span>
                                                    <input value="{{ $user->username }}" type="text" name="username"
                                                           id="username" autocomplete="username"
                                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                           placeholder="janesmith">
                                                </div>
                                            </div>
                                            <!-- TODO: Put instant verification -->
                                        </div>

                                        <div class="col-span-full">
                                            <label for="about"
                                                   class="block text-sm font-medium leading-6 text-gray-900">About</label>
                                            <div class="mt-2">
                                    <textarea id="about" name="about" rows="3"
                                              class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $user->about }}</textarea>
                                            </div>
                                            <p class="mt-1 text-sm leading-6 text-gray-600">Write a few sentences about
                                                yourself.</p>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                                        <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                                        <div class="mt-1 lg:hidden">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12"
                                                    aria-hidden="true">

                                                    @if (str_starts_with($user->avatarUpload[0], 'initial'))
                                                        <img class="rounded-full h-full w-full"
                                                             src="{{ asset('storage/' . $user->avatarUpload[0] . '.svg') }}"
                                                             alt="Profile Picture of {{ $user->firstname . $user->lastname }}"/>
                                                    @else
                                                        <img class="rounded-full h-full w-full"
                                                             srcset="
            @foreach($user->avatarUpload as $imagePath)
                                                             {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
            @endforeach
                                                                 "
                                                             src="{{ asset('storage/' . $user->avatarUpload[0]) }}"
                                                             alt="Profile Picture of {{ $user->firstname . $user->lastname }}"/>
                                                    @endif

                                                </div>
                                                <div class="ml-5 rounded-md shadow-sm">
                                                    <div
                                                        class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                                        <label for="mobile-user-photo"
                                                               class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                                            <span>Change</span>
                                                            <span class="sr-only"> user photo</span>
                                                        </label>
                                                        <input id="mobile-user-photo" name="user-photo" type="file"
                                                               class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden relative rounded-full overflow-hidden lg:block">
                                            @if (str_starts_with($user->avatarUpload[0], 'initial'))
                                                <img class="relative rounded-full w-40 h-40"
                                                     src="{{ asset('storage/' . $user->avatarUpload[0] . '.svg') }}"
                                                     alt="Profile Picture of {{ $user->firstname . $user->lastname }}"/>
                                            @else
                                                <img class="relative rounded-full w-40 h-40"
                                                     srcset="
            @foreach($user->avatarUpload as $imagePath)
                                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
            @endforeach
                                                         "
                                                     src="{{ asset('storage/' . $user->avatarUpload[0]) }}"
                                                     alt="Profile Picture of {{ $user->firstname . $user->lastname }}"/>
                                            @endif

                                            <label for="desktop-user-photo"
                                                   class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                                <span>Change</span>
                                                <span class="sr-only"> user photo</span>
                                                <input type="file" id="desktop-user-photo" name="user-photo"
                                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="firstname"
                                               class="block text-sm font-medium leading-6 text-gray-900">First
                                            name</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->firstname }}" type="text" name="firstname"
                                                   id="firstname" autocomplete="given-name"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Last
                                            name</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->lastname }}" type="text" name="lastname"
                                                   id="lastname" autocomplete="family-name"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                            address</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->email }}" id="email" name="email" type="email"
                                                   autocomplete="email"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="streetAddress"
                                               class="block text-sm font-medium leading-6 text-gray-900">Street
                                            address</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->streetAddress }}" type="text" name="streetAddress"
                                                   id="streetAddress"
                                                   autocomplete="street-address"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2 sm:col-start-1">
                                        <label for="city"
                                               class="block text-sm font-medium leading-6 text-gray-900">City</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->city }}" type="text" name="city" id="city"
                                                   autocomplete="city"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State
                                            /
                                            Province</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->region }}" type="text" name="region" id="region"
                                                   autocomplete="region"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="postalCode"
                                               class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                                            Postal code</label>
                                        <div class="mt-2">
                                            <input value="{{ $user->postalCode }}" type="text" name="postalCode"
                                                   id="postalCode" autocomplete="postal-code"
                                                   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 -mx-6 -mb-8 mt-6">
                                    <x-button type="submit" kind="primary">Save</x-button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">

                            <form class="divide-y divide-gray-200 lg:col-span-12" action="#" method="POST">
                                <!-- Profile section -->
                                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg leading-6 font-medium text-gray-900">Realisations</h2>
                                        <p class="mt-1 text-sm text-gray-500">Ornare eu a volutpat eget vulputate.
                                            Fringilla
                                            commodo amet.</p>
                                    </div>

                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="mt-8">
                                        <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"
                                                  d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                        </svg>

                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No realisations</h3>
                                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new
                                            realisation.</p>
                                        <div class="mt-6">
                                            <button type="button"
                                                    class="whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                                                <!-- Heroicon name: solid/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                          d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                New Realisation
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Privacy section -->
                                    <div class="divide-y">

                                        <div class="flex flex-col my-4">
                                            <div class="block bg-white mt-4">
                                                <p class="mb-1 text-md font-bold tracking-tight text-gray-900">
                                                    Noteworthy technology acquisitions 2021</p>
                                                <p class="text-md text-gray-500 mb-2">Here are the biggest enterprise
                                                    technology acquisitions of 2021 so far, in reverse chronological
                                                    order.</p>
                                                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                                                             alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 flex gap-2 justify-end">
                                                <x-button type="submit" kind="primary">Edit</x-button>
                                                <x-button type="submit" kind="danger">Delete</x-button>
                                            </div>
                                        </div>
                                        <div class="flex flex-col my-4">
                                            <div class="block bg-white mt-4">
                                                <p class="mb-1 text-md font-bold tracking-tight text-gray-900">
                                                    Noteworthy technology acquisitions 2021</p>
                                                <p class="text-md text-gray-500 mb-2">Here are the biggest enterprise
                                                    technology acquisitions of 2021 so far, in reverse chronological
                                                    order.</p>
                                                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                                             alt="">
                                                    </div>
                                                    <div>
                                                        <img class="h-auto max-w-full rounded-lg"
                                                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                                                             alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 flex gap-2 justify-end">
                                                <x-button type="submit" kind="primary">Edit</x-button>
                                                <x-button type="submit" kind="danger">Delete</x-button>
                                            </div>
                                            <div class="mx-auto mt-8">
                                                <button type="button"
                                                        class="whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                                                    <!-- Heroicon name: solid/plus -->
                                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                    New Realisation
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <form id="realizations-form">
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-3">
                                                <label for="title"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                                <div class="mt-2">
                                                    <input type="text" name="title" id="title" autocomplete="title"
                                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="description"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                                <div class="mt-2">
                                                    <input type="text" name="description" id="description"
                                                           autocomplete="description"
                                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                                <p class="mt-2 text-gray-500 text-sm">
                                                    Short description (max 256 characters).
                                                </p>
                                            </div>

                                            <div class="sm:col-span-6">
                                                <label for="pictures"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Pictures</label>
                                                <div class="flex items-center justify-center w-full">
                                                    <label for="pictures"
                                                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                        <div
                                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400"
                                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                            </svg>
                                                            <p class="mb-2 text-sm text-gray-500"><span
                                                                    class="font-semibold">Click to upload</span> or drag
                                                                and drop</p>
                                                            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX.
                                                                800x400px)</p>
                                                        </div>
                                                        <input type="file" class="hidden" id="pictures"
                                                               name="pictures[]" accept="image/*" multiple max="5"/>
                                                    </label>
                                                </div>
                                                <div class="preview-container flex gap-2 mt-2"></div>
                                                <!-- Container for preview images -->
                                            </div>


                                        </div>
                                        <div class="justify-end flex">
                                            <x-button type="submit" kind="primary" class="mt-4">Submit</x-button>
                                        </div>
                                    </form>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>



@endsection

@section('scripts')
    <script>
        const fileInput = document.getElementById('pictures');
        const previewContainer = document.querySelector('.preview-container');
        const maxPictures = 5;

        fileInput.addEventListener('change', handleFileUpload);

        function handleFileUpload(event) {
            const files = event.target.files;
            const currentPictures = previewContainer.querySelectorAll('img').length;

            if (currentPictures + files.length > maxPictures) {
                alert(`You can only upload up to ${maxPictures} pictures.`);
                return;
            }

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (event) {
                    const image = new Image();
                    image.src = event.target.result;

                    image.onload = function () {
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');

                        // Resize image to 120x120 pixels
                        const aspectRatio = this.width / this.height;
                        const maxWidth = 120;
                        const maxHeight = 120;

                        let width = this.width;
                        let height = this.height;

                        if (width > maxWidth) {
                            width = maxWidth;
                            height = width / aspectRatio;
                        }

                        if (height > maxHeight) {
                            height = maxHeight;
                            width = height * aspectRatio;
                        }

                        canvas.width = width;
                        canvas.height = height;

                        // Draw the resized image on the canvas
                        context.drawImage(this, 0, 0, width, height);

                        // Create an <img> element with the resized image
                        const previewImage = document.createElement('img');
                        previewImage.src = canvas.toDataURL('image/jpeg');
                        previewImage.alt = 'Preview Image';
                        previewImage.style.width = 'auto';
                        previewImage.style.height = '120px';

                        // Append the preview image to the container
                        previewContainer.appendChild(previewImage);
                    };
                };


                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection













