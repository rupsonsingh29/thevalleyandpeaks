@extends('layouts.app')

@section('title', 'International Travel Destinations | The Valley & Peaks')
@section('meta_description', 'Explore international travel destinations across Asia, Europe, North America, South America, Africa, and Oceania.')

@section('content')
<section class="hero" style="padding: 3rem 0; background-image: url('{{ asset('image/international.jpg') }}')">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">Worldwide</p>
            <h1 class="hero__title">International Destinations</h1>
            <p class="hero__subtitle">Curated guides to the world's most inspiring places, organized by continent.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        @foreach($destinationsByContinent as $continent => $destinations)
            <div style="margin-bottom: 3rem;">
                <h2 style="margin-bottom: 1.5rem;">
                    <a href="{{ route('destinations.continent', $continent) }}">
                        {{ ucwords(str_replace('-', ' ', $continent)) }}
                    </a>
                </h2>
                <div class="grid grid--4">
                    @foreach($destinations as $destination)
                        <x-destination-card :destination="$destination" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
