<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image',
        'author_id', 'category_id', 'reading_time', 'status',
        'is_featured', 'is_trending', 'meta_title', 'meta_description',
        'views', 'published_at', 'content_updated_at',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_trending' => 'boolean',
            'published_at' => 'datetime',
            'content_updated_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class);
    }

    public function faqs(): MorphMany
    {
        return $this->morphMany(Faq::class, 'faqable')->orderBy('sort_order');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeTrending(Builder $query): Builder
    {
        return $query->where('is_trending', true);
    }

    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderByDesc('published_at');
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getTableOfContents(): array
    {
        preg_match_all('/<h([2-4])[^>]*id="([^"]*)"[^>]*>(.*?)<\/h\1>/i', $this->content, $matches, PREG_SET_ORDER);

        return collect($matches)->map(fn ($match) => [
            'level' => (int) $match[1],
            'id' => $match[2],
            'text' => strip_tags($match[3]),
        ])->all();
    }
}
