<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Destination;
use App\Services\SchemaService;

class HomeController extends Controller
{
    public function __construct(private SchemaService $schema) {}

    public function index()
    {
        $featuredDestinations = Destination::featured()->orderBy('sort_order')->take(6)->get();
        $latestArticles = Article::published()->with(['author', 'category'])->latest()->take(6)->get();
        $nepalDestinations = Destination::nepal()->orderBy('sort_order')->take(4)->get();
        $internationalDestinations = Destination::international()->featured()->orderBy('sort_order')->take(4)->get();
        $trekkingArticles = Article::published()
            ->whereHas('category', fn ($q) => $q->where('slug', 'trekking'))
            ->latest()->take(3)->get();
        $foodArticles = Article::published()
            ->whereHas('category', fn ($q) => $q->where('slug', 'food'))
            ->latest()->take(3)->get();
        $hotelArticles = Article::published()
            ->whereHas('category', fn ($q) => $q->where('slug', 'hotels'))
            ->latest()->take(3)->get();
        $featuredStories = Article::published()->featured()->with(['author', 'category'])->latest()->take(3)->get();
        $trendingArticles = Article::published()->trending()->latest()->take(5)->get();

        $schemas = [
            $this->schema->organization(),
            $this->schema->website(),
        ];

        
        return view('home', compact(
            'featuredDestinations',
            'latestArticles',
            'nepalDestinations',
            'internationalDestinations',
            'trekkingArticles',
            'foodArticles',
            'hotelArticles',
            'featuredStories',
            'trendingArticles',
            'schemas',
        ));
    }
}
