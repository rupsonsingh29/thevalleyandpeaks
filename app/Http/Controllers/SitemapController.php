<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Page;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect([
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('destinations.index'), 'priority' => '0.9'],
            ['loc' => route('destinations.nepal'), 'priority' => '0.9'],
            ['loc' => route('destinations.international'), 'priority' => '0.9'],
            ['loc' => route('blog.index'), 'priority' => '0.9'],
            ['loc' => route('about'), 'priority' => '0.7'],
            ['loc' => route('contact'), 'priority' => '0.7'],
        ]);

        Destination::all()->each(fn ($d) => $urls->push([
            'loc' => route('destinations.show', $d),
            'lastmod' => $d->updated_at->toAtomString(),
            'priority' => '0.8',
        ]));

        Article::published()->get()->each(fn ($a) => $urls->push([
            'loc' => route('blog.show', $a),
            'lastmod' => ($a->content_updated_at ?? $a->updated_at)->toAtomString(),
            'priority' => '0.8',
        ]));

        Category::all()->each(fn ($c) => $urls->push([
            'loc' => route('blog.category', $c),
            'priority' => '0.6',
        ]));

        Page::where('is_published', true)->get()->each(fn ($p) => $urls->push([
            'loc' => url('/'.$p->slug),
            'lastmod' => $p->updated_at->toAtomString(),
            'priority' => '0.5',
        ]));

        $xml = view('sitemap', ['urls' => $urls])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
