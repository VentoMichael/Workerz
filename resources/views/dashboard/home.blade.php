@extends('layouts.dashboard.layout')
@section('title', 'Dashboard')
@section('description', 'Welcome to your dashboard! Manage your profile, settings, and activities.')
@section('keywords', 'dashboard, manage profile, settings, activities')

@section('content')

    <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        @include('layouts.dashboard.secondHeader')






        </div>
    </main>



@endsection



