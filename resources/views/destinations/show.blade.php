@extends('layouts.app')

@section('title', ($destination->meta_title ?? $destination->name.' Travel Guide').' | The Valley & Peaks')
@section('meta_description', $destination->meta_description ?? $destination->excerpt)

@section('content')
<article>
    <header class="article-header container">
        <div class="article-header__category">
            {{ $destination->type === 'nepal' ? 'Nepal' : ucwords(str_replace('-', ' ', $destination->continent ?? '')) }}
        </div>
        <h1 class="article-header__title">{{ $destination->name }}</h1>
        @if($destination->excerpt)
            <p style="color: var(--color-muted); font-size: 1.15rem;">{{ $destination->excerpt }}</p>
        @endif
    </header>

    <div class="container" style="margin-bottom: 2rem;">
        <div class="article-featured-image">
            @if($destination->featured_image)
                <img src="{{ asset('storage/'.$destination->featured_image) }}" alt="{{ $destination->name }}" style="width:100%;height:100%;object-fit:cover;">
            @else
                <div class="card__image--placeholder" style="height:100%;font-size:2rem;">{{ $destination->name }}</div>
            @endif
        </div>
    </div>

    <div class="container ">
        <div class="article-content">
            {!! $destination->content !!}
        </div>

        @include('partials.faq', ['faqs' => $destination->faqs])
    </div>

  
</article>

@if($articles->isNotEmpty())
<section class="section " style="background:  var(--color-bg-alt)">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Blogs for {{ $destination->name }}</h2>
        </div>
        <div class="grid grid--3">
            @foreach($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endif

@if($relatedDestinations->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Related Destinations</h2>
        </div>
     
        <div class="scroll-row">
            @foreach($relatedDestinations as $related)
                <div class="scroll-row__item">
                    <x-destination-card :destination="$related" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
