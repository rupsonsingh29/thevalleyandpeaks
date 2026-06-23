@props(['destination'])

<article class="card">
    <a href="{{ route('destinations.show', $destination) }}">
        <div class="card__image">
            @if($destination->featured_image)
                <img src="{{ asset('storage/'.$destination->featured_image) }}" alt="{{ $destination->name }}" loading="lazy">
            @else
                <div class="card__image--placeholder">{{ $destination->name }}</div>
            @endif
        </div>
    </a>
    <div class="card__body">
        <div class="card__category">
            {{ $destination->type === 'nepal' ? 'Nepal' : ucwords(str_replace('-', ' ', $destination->continent ?? 'International')) }}
        </div>
        <h3 class="card__title">
            <a href="{{ route('destinations.show', $destination) }}">{{ $destination->name }}</a>
        </h3>
        @if($destination->excerpt)
            <p class="card__excerpt">{{ $destination->excerpt }}</p>
        @endif
    </div>
</article>
