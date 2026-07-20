<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Destination extends Model
{
    protected $fillable = [
        'name', 'slug', 'type','nepal_type', 'continent', 'country',
        'excerpt', 'content', 'featured_image',
        'meta_title', 'meta_description', 'is_featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function faqs(): MorphMany
    {
        return $this->morphMany(Faq::class, 'faqable')->orderBy('sort_order');
    }

    public function scopeNepal($query)
    {
        return $query->where('type', 'nepal');
    }

    public function scopeInternational($query)
    {
        return $query->where('type', 'international');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByContinent($query, string $continent)
    {
        return $query->where('continent', $continent);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
