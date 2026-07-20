<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug','featured_image', 'type', 'parent_id', 'description',
        'meta_title', 'meta_description', 'sort_order',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('sort_order');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function scopeNepal($query)
    {
        return $query->where('type', 'nepal');
    }

    public function scopeInternational($query)
    {
        return $query->where('type', 'international');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
