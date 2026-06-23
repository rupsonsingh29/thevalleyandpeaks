@extends('layouts.app')

@section('title', $category->name.' | Travel Blog | The Valley & Peaks')
@section('meta_description', $category->description ?? "Travel guides and stories in the {$category->name} category.")

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">{{ ucfirst($category->type) }}</p>
            <h1 class="hero__title">{{ $category->name }}</h1>
            @if($category->description)
                <p class="hero__subtitle">{{ $category->description }}</p>
            @endif
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid--2">
            @forelse($articles as $article)
                <x-article-card :article="$article" />
            @empty
                <p>No articles in this category yet.</p>
            @endforelse
        </div>
        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </div>
</section>
@endsection
