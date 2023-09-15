@extends('layouts.dashboard.layout')
@section('title', 'Account Settings')
@section('description', 'Update your account settings and preferences.')
@section('keywords', 'account settings, user preferences, update settings')

@section('content')






    <div class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        @include('layouts.dashboard.secondHeader')


        <!-- Payment details -->
            <div id="main_content" class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <div class="">
                    <section class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                        <div class="divide-y divide-gray-200 lg:col-span-12">

                        <livewire:update-password-profil/>
                        <livewire:settings/>
                        </div>

                    </section>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('scripts')
@endsection

