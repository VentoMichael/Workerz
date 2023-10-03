@extends('layouts.layout')
@section('title', 'Browse Ads')
@section('description', 'Browse all the latest ads posted on Workerz. Find the best freelancers for your project needs.')
@section('keywords', 'Browse Ads, Freelancers, Projects, Services, Workerz')

@section('content')

    <section>
        <h1 class="sr-only">
            Ads page
        </h1>
        <livewire:preview-list />
@endsection

