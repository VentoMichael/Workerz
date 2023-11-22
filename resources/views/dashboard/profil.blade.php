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
                    <livewire:profil-updates/>
                </div>
                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">

                            <livewire:realisations-form/>
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













