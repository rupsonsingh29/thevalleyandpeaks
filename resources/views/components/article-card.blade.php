@props(['article'])

<article class="card">
    
    <a href="{{ route('blog.show', $article) }}">
        <div class="card__image">
            @if($article->featured_image)
                <img src="{{ asset('storage/'.$article->featured_image) }}" alt="{{ $article->title }}" loading="lazy">
            @else
                <div class="card__image--placeholder">{{ $article->category->name ?? 'Guide' }}</div>
            @endif
        </div>
    </a>
    <div class="card__body">
        @if($article->category)
            <div class="card__category">{{ $article->category->name }}</div>
        @endif
        <h3 class="card__title">
            <a href="{{ route('blog.show', $article) }}">{{ $article->title }}</a>
        </h3>
        @if($article->excerpt)
            <p class="card__excerpt">{{ $article->excerpt }}</p>
        @endif
        <div class="card__meta">
            <span>{{ $article->author->name }}</span>
            <span>&middot;</span>
            <span>{{ $article->reading_time }} min read</span>
            @if($article->published_at)
                <span>&middot;</span>
                <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('M j, Y') }}</time>
            @endif
        </div>
    </div>
</article>
