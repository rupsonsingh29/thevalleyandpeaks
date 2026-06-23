<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Destination;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->get('q', ''));

        $articles = collect();
        $destinations = collect();

        if (strlen($query) >= 2) {
            $articles = Article::published()
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('excerpt', 'like', "%{$query}%")
                        ->orWhere('content', 'like', "%{$query}%");
                })
                ->with(['author', 'category'])
                ->latest()
                ->take(20)
                ->get();

            $destinations = Destination::where('name', 'like', "%{$query}%")
                ->orWhere('excerpt', 'like', "%{$query}%")
                ->orderBy('sort_order')
                ->take(10)
                ->get();
        }

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Search'],
        ];

        return view('search', compact('query', 'articles', 'destinations', 'breadcrumbs'));
    }
}
