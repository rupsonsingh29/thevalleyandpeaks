<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Services\SchemaService;

class BlogController extends Controller
{
    public function __construct(private SchemaService $schema) {}

    public function index()
    {
        $articles = Article::published()
            ->with(['author', 'category', 'destinations'])
            ->latest()
            ->paginate(12);

        $nepalCategories = Category::nepal()->whereNull('parent_id')->with('children')->orderBy('sort_order')->get();
        $internationalCategories = Category::international()->orderBy('sort_order','asc')->get();
        $trendingArticles = Article::published()->trending()->latest()->take(5)->get();
        $popularArticles = Article::published()->orderByDesc('views')->take(5)->get();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Blog'],
        ];

        return view('blog.index', compact(
            'articles',
            'nepalCategories',
            'internationalCategories',
            'trendingArticles',
            'popularArticles',
            'breadcrumbs',
        ));
    }

    public function category(Category $category)
    {
        $articles = Article::published()
            ->where('category_id', $category->id)
            ->with(['author', 'category', 'destinations'])
            ->latest()
            ->paginate(12);

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Blog', 'url' => route('blog.index')],
            ['name' => $category->name],
        ];

        return view('blog.category', compact('articles', 'category', 'breadcrumbs'));
    }

    public function show(Article $article)
    {
        if ($article->status !== 'published' || ! $article->published_at || $article->published_at->isFuture()) {
            abort(404);
        }

        $article->load(['author', 'category', 'destinations', 'faqs']);
        $article->incrementViews();

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->where(function ($q) use ($article) {
                $q->where('category_id', $article->category_id)
                    ->orWhereHas('destinations', fn ($dq) => $dq->whereIn(
                        'destinations.id',
                        $article->destinations->pluck('id')
                    ));
            })
            ->latest()
            ->take(4)
            ->get();

        $recommendedReading = Article::published()
            ->where('id', '!=', $article->id)
            ->featured()
            ->latest()
            ->take(3)
            ->get();

        $tableOfContents = $article->getTableOfContents();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Blog', 'url' => route('blog.index')],
            ['name' => $article->category->name, 'url' => route('blog.category', $article->category)],
            ['name' => $article->title],
        ];

        $schemas = [
            $this->schema->organization(),
            $this->schema->article($article),
            $this->schema->author($article->author),
            $this->schema->breadcrumbs($breadcrumbs),
        ];

        if ($article->faqs->isNotEmpty()) {
            $schemas[] = $this->schema->faq($article->faqs);
        }

        return view('blog.show', compact(
            'article',
            'relatedArticles',
            'recommendedReading',
            'tableOfContents',
            'breadcrumbs',
            'schemas',
        ));
    }
}
