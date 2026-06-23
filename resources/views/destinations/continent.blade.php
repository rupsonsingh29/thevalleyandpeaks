@extends('layouts.app')

@section('title', $continentLabel.' Travel Destinations | The Valley & Peaks')

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">International</p>
            <h1 class="hero__title">{{ $continentLabel }}</h1>
            <p class="hero__subtitle">Travel guides and destination insights across {{ $continentLabel }}.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid--3">
            @foreach($destinations as $destination)
                <x-destination-card :destination="$destination" />
            @endforeach
        </div>
    </div>
</section>

@if($articles->isNotEmpty())
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Latest from {{ $continentLabel }}</h2>
        </div>
        <div class="grid grid--3">
            @foreach($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
