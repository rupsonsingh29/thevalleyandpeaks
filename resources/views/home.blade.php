@extends('layouts.app')

@section('title', 'The Valley & Peaks | Travel Guides from Nepal & Beyond')

@section('content')
<section class="hero" style="background-image: url('{{ asset('image/hero.jpg') }}')">
    <div class="container">
        <div class="hero__content">
            
            <p class="hero__eyebrow">Travel Publication</p>
            <h1 class="hero__title">Discover the World's Valleys, Peaks & Hidden Journeys</h1>
            <p class="hero__subtitle">
                Authentic travel guides, destination insights, food experiences, hotel reviews, and unforgettable adventures from Nepal and beyond.
            </p>
            <div class="hero__actions">
                <a href="{{ route('destinations.index') }}" class="btn btn--primary">Explore Destinations</a>
                <a href="{{ route('blog.index') }}" class="btn btn--secondary">Read Latest Guides</a>
            </div>
        </div>
    </div>
</section>

{{-- @if($featuredDestinations->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Explore</p>
            <h2 class="section__title">Popular Destinations</h2>
            <p class="section__desc">From Himalayan peaks to hidden valleys, discover places worth the journey.</p>
        </div>
        <div class="grid grid--3">
            @foreach($featuredDestinations as $destination)
                <x-destination-card :destination="$destination" />
            @endforeach
        </div>
        <div class="section__footer">
            <a href="{{ route('destinations.index') }}" class="btn btn--outline btn--small">View All Destinations</a>
        </div>
    </div>
</section>
@endif --}}

@if($latestArticles->isNotEmpty())
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Latest</p>
            <h2 class="section__title">Latest Travel Guides</h2>
        </div>
        <div class="grid grid--3">
            @foreach($latestArticles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
        <div class="section__footer">
            <a href="{{ route('blog.index') }}" class="btn btn--outline btn--small">Read More Guides</a>
        </div>
    </div>
</section>
@endif

{{-- @if($nepalDestinations->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Nepal</p>
            <h2 class="section__title">Nepal Highlights</h2>
            <p class="section__desc">Ancient temples, towering peaks, and warm hospitality in the heart of the Himalayas.</p>
        </div>
        <div class="grid grid--4">
            @foreach($nepalDestinations as $destination)
                <x-destination-card :destination="$destination" />
            @endforeach
        </div>
        <div class="section__footer">
            <a href="{{ route('destinations.nepal') }}" class="btn btn--outline btn--small">Explore Nepal</a>
        </div>
    </div>
</section>
@endif --}}

{{-- @if($internationalDestinations->isNotEmpty())
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Worldwide</p>
            <h2 class="section__title">International Adventures</h2>
        </div>
        <div class="grid grid--4">
            @foreach($internationalDestinations as $destination)
                <x-destination-card :destination="$destination" />
            @endforeach
        </div>
        <div class="section__footer">
            <a href="{{ route('destinations.international') }}" class="btn btn--outline btn--small">Explore International</a>
        </div>
    </div>
</section>
@endif --}}

{{-- @if($trekkingArticles->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Mountains</p>
            <h2 class="section__title">Trekking & Mountains</h2>
        </div>
        <div class="grid grid--3">
            @foreach($trekkingArticles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endif --}}

{{-- @if($foodArticles->isNotEmpty())
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Cuisine</p>
            <h2 class="section__title">Food & Culture</h2>
        </div>
        <div class="grid grid--3">
            @foreach($foodArticles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endif --}}

{{-- @if($hotelArticles->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Stays</p>
            <h2 class="section__title">Hotel Reviews</h2>
        </div>
        <div class="grid grid--3">
            @foreach($hotelArticles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endif --}}

{{-- @if($featuredStories->isNotEmpty())
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Editor's Pick</p>
            <h2 class="section__title">Featured Stories</h2>
        </div>
        <div class="grid grid--3">
            @foreach($featuredStories as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endif --}}
@endsection
