@extends('layouts.app')

@section('title', 'Search'.($query ? ': '.$query : '').' | The Valley & Peaks')

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__title">Search</h1>
            <form action="{{ route('search') }}" method="GET" class="newsletter__form" style="margin-top: 1.5rem;">
                <input type="search" name="q" value="{{ $query }}" placeholder="Search destinations and articles..." aria-label="Search query">
                <button type="submit" class="btn btn--primary">Search</button>
            </form>
        </div>
    </div>
</section>

@if(strlen($query) >= 2)
<section class="section">
    <div class="container">
        @if($destinations->isNotEmpty())
            <h2 style="margin-bottom: 1.5rem;">Destinations</h2>
            <div class="destination-list" style="margin-bottom: 3rem;">
                @foreach($destinations as $destination)
                    <a href="{{ route('destinations.show', $destination) }}" class="destination-card">
                        <div class="destination-card__region">{{ $destination->type === 'nepal' ? 'Nepal' : $destination->country }}</div>
                        <h3 class="destination-card__name">{{ $destination->name }}</h3>
                    </a>
                @endforeach
            </div>
        @endif

        @if($articles->isNotEmpty())
            <h2 style="margin-bottom: 1.5rem;">Articles</h2>
            <div class="grid grid--2">
                @foreach($articles as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
        @endif

        @if($destinations->isEmpty() && $articles->isEmpty())
            <p style="text-align: center; color: var(--color-muted);">No results found for "{{ $query }}". Try different keywords.</p>
        @endif
    </div>
</section>
@elseif($query)
<section class="section">
    <div class="container">
        <p style="text-align: center; color: var(--color-muted);">Please enter at least 2 characters to search.</p>
    </div>
</section>
@endif
@endsection
