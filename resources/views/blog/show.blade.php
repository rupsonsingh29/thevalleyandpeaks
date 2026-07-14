@extends('layouts.app')

@section('title', ($article->meta_title ?? $article->title) . ' | The Valley & Peaks')
@section('meta_description', $article->meta_description ?? $article->excerpt)

@push('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->excerpt }}">
    @if($article->featured_image)
        <meta property="og:image" content="{{ asset('storage/' . $article->featured_image) }}">
    @endif
    <meta property="article:published_time" content="{{ $article->published_at?->toIso8601String() }}">
    <meta property="article:modified_time"
        content="{{ ($article->content_updated_at ?? $article->updated_at)->toIso8601String() }}">
    <meta property="article:author" content="{{ $article->author->name }}">
@endpush

@section('content')
    <article itemscope itemtype="https://schema.org/Article">
        <header class="article-header container">
            <div class="article-header__category">
                <a href="{{ route('blog.category', $article->category) }}">{{ $article->category->name }}</a>
            </div>
            <h1 class="article-header__title" itemprop="headline">{{ $article->title }}</h1>
            <div class="article-meta">
                {{-- <div class="article-meta__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <div class="article-meta__avatar">{{ substr($article->author->name, 0, 1) }}</div>
                    <span itemprop="name">{{ $article->author->name }}</span>
                </div> --}}
                <div class="article-meta__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <div class="article-meta__avatar">
                        @if($article->author->avatar)
                            <img src="{{ Storage::url($article->author->avatar) }}" alt="{{ $article->author->name }}"
                                itemprop="image">
                        @else
                            {{ substr($article->author->name, 0, 1) }}
                        @endif
                    </div>
                    <span itemprop="name">{{ $article->author->name }}</span>
                </div>
                <span>&middot;</span>
                <span>{{ $article->reading_time }} min read</span>
                @if($article->published_at)
                    <span>&middot;</span>
                    <time datetime="{{ $article->published_at->toIso8601String() }}" itemprop="datePublished">
                        Published {{ $article->published_at->format('F j, Y') }}
                    </time>
                @endif
                @if($article->content_updated_at)
                    <span>&middot;</span>
                    <time datetime="{{ $article->content_updated_at->toIso8601String() }}" itemprop="dateModified">
                        Updated {{ $article->content_updated_at->format('F j, Y') }}
                    </time>
                @endif
            </div>
        </header>

        <div class="container" style="margin-bottom: 2rem;">
            <div class="article-featured-image">
                @if($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" itemprop="image"
                        style="width:100%;height:100%;object-fit:cover;">
                @else
                    <div class="card__image--placeholder" style="height:100%;font-size:2rem;">{{ $article->category->name }}
                    </div>
                @endif
            </div>
        </div>

        <div class="container">
            <div class="article-layout">
                @if(count($tableOfContents) > 0)
                    <aside class="article-toc" aria-label="Table of contents">
                        <h3>In This Article :</h3>
                        <ul>
                            @foreach($tableOfContents as $item)
                                
                                <li class="toc-level-{{ $item['level'] }}">
                                    <a href="#{{ $item['id'] }}">{{ $item['text'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                @endif

                <div>
                    <div class="article-content" itemprop="articleBody">
                        {!! $article->content !!}
                    </div>

                    @if($article->destinations->isNotEmpty())
                        <div class="article-tags">
                            <strong
                                style="font-size: 0.8125rem; color: var(--color-muted); margin-right: 0.5rem;">Destinations:</strong>
                            @foreach($article->destinations as $destination)
                                <a href="{{ route('destinations.show', $destination) }}" class="tag">{{ $destination->name }}</a>
                            @endforeach
                        </div>
                    @endif

                    @include('partials.faq', ['faqs' => $article->faqs])
                </div>
            </div>
        </div>
    </article>

    @if($relatedArticles->isNotEmpty())
        <section class="section section--alt">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title">Related Articles</h2>
                </div>
                <div class="grid grid--2">
                    @foreach($relatedArticles as $related)
                        <x-article-card :article="$related" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($recommendedReading->isNotEmpty())
        <section class="section">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title">Recommended Reading</h2>
                </div>
                <div class="grid grid--3">
                    @foreach($recommendedReading as $rec)
                        <x-article-card :article="$rec" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection