<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Author;
use App\Models\Destination;
use Illuminate\Support\Collection;

class SchemaService
{
    public function organization(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'The Valley & Peaks',
            'url' => url('/'),
            'logo' => asset('images/logo.png'),
            'description' => 'Authentic travel guides, destination insights, and unforgettable adventures from Nepal and beyond.',
            'sameAs' => [
                'https://instagram.com/thevalleyandpeaks',
                'https://facebook.com/thevalleyandpeaks',
                'https://twitter.com/thevalleyandpeaks',
            ],
        ];
    }

    public function website(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'The Valley & Peaks',
            'url' => url('/'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => url('/search?q={search_term_string}'),
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }

    public function breadcrumbs(array $items): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($items)->values()->map(fn ($item, $index) => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? null,
            ])->all(),
        ];
    }

    public function article(Article $article): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article->title,
            'description' => $article->excerpt ?? $article->meta_description,
            'image' => $article->featured_image ? asset('storage/'.$article->featured_image) : null,
            'datePublished' => $article->published_at?->toIso8601String(),
            'dateModified' => ($article->content_updated_at ?? $article->updated_at)->toIso8601String(),
            'author' => $this->author($article->author),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'The Valley & Peaks',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => url()->current(),
            ],
        ];
    }

    public function author(Author $author): array
    {
        return [
            '@type' => 'Person',
            'name' => $author->name,
            'url' => route('about'),
            'description' => $author->bio,
            'image' => $author->avatar ? asset('storage/'.$author->avatar) : null,
        ];
    }

    public function faq(Collection|array $faqs): array
    {
        $items = $faqs instanceof Collection ? $faqs : collect($faqs);

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $items->map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($faq->answer),
                ],
            ])->all(),
        ];
    }

    public function destination(Destination $destination): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'TouristDestination',
            'name' => $destination->name,
            'description' => $destination->excerpt ?? $destination->meta_description,
            'image' => $destination->featured_image ? asset('storage/'.$destination->featured_image) : null,
            'url' => url()->current(),
        ];
    }
}
