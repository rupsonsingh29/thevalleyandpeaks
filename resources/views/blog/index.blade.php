@extends('layouts.app')

@section('title', 'Travel Blog | The Valley & Peaks')
@section('meta_description', 'Travel guides, trekking tips, food stories, hotel reviews, and cultural insights from Nepal and around the world.')

@section('content') 
<section class="hero" style="padding: 3rem 0; background-image: url('{{ asset('image/nepal-2.jpg') }}')">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">Publication</p>
            <h1 class="hero__title">Travel Blog</h1>
            <p class="hero__subtitle">In-depth guides, personal stories, and practical advice for curious travelers.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="blog-layout">
            <div>
                <div class="grid grid--2">
                    @forelse($articles as $article)
                        <x-article-card :article="$article" />
                    @empty
                        <p>No articles published yet. Check back soon.</p>
                    @endforelse
                </div>
                <div class="pagination">
                    {{ $articles->links() }}
                </div>
            </div>

            <aside>
                <div class="sidebar-widget">
                    <h3 class="sidebar-widget__title">Nepal Categories</h3>
                    <ul class="sidebar-widget__list">
                        @foreach($nepalCategories as $category)
                            <li><a href="{{ route('blog.category', $category) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3 class="sidebar-widget__title">International</h3>
                    <ul class="sidebar-widget__list">
                        @foreach($internationalCategories as $category)
                            <li><a href="{{ route('blog.category', $category) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                @if($trendingArticles->isNotEmpty())
                <div class="sidebar-widget">
                    <h3 class="sidebar-widget__title">Trending</h3>
                    <ul class="sidebar-widget__list">
                        @foreach($trendingArticles as $article)
                            <li><a href="{{ route('blog.show', $article) }}">{{ $article->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($popularArticles->isNotEmpty())
                <div class="sidebar-widget">
                    <h3 class="sidebar-widget__title">Popular</h3>
                    <ul class="sidebar-widget__list">
                        @foreach($popularArticles as $article)
                            <li><a href="{{ route('blog.show', $article) }}">{{ $article->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </aside>
        </div>
    </div>
</section>
@endsection
