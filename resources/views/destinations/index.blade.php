@extends('layouts.app')

@section('title', 'Destinations | The Valley & Peaks')
@section('meta_description', 'Explore travel destinations across Nepal and the world. Comprehensive guides to valleys, peaks, cities, and hidden gems.')

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">Destination Hub</p>
            <h1 class="hero__title">Explore the World</h1>
            <p class="hero__subtitle">From the Himalayas to distant shores — curated destination guides to inspire your next journey.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">Nepal</p>
            <h2 class="section__title">Nepal Destinations</h2>
            <p class="section__desc">Ten remarkable regions, each with its own character, culture, and adventures.</p>
        </div>
        <div class="destination-list">
            @foreach($nepalDestinations as $destination)
                <a href="{{ route('destinations.show', $destination) }}" class="destination-card">
                    <div class="destination-card__region">Nepal</div>
                    <h3 class="destination-card__name">{{ $destination->name }}</h3>
                    @if($destination->excerpt)
                        <p class="card__excerpt">{{ Str::limit($destination->excerpt, 100) }}</p>
                    @endif
                </a>
            @endforeach
        </div>
        <div class="section__footer">
            <a href="{{ route('destinations.nepal') }}" class="btn btn--outline btn--small">View Nepal Hub</a>
        </div>
    </div>
</section>

<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <p class="section__eyebrow">International</p>
            <h2 class="section__title">Explore by Continent</h2>
        </div>

        @foreach($internationalByContinent as $continent => $destinations)
            <div style="margin-bottom: 3rem;">
                <h3 style="margin-bottom: 1rem;">
                    <a href="{{ route('destinations.continent', $continent) }}">
                        {{ ucwords(str_replace('-', ' ', $continent)) }}
                    </a>
                </h3>
                <div class="destination-list">
                    @foreach($destinations as $destination)
                        <a href="{{ route('destinations.show', $destination) }}" class="destination-card">
                            <div class="destination-card__region">{{ $destination->country }}</div>
                            <h4 class="destination-card__name">{{ $destination->name }}</h4>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
