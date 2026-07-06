<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\SchemaService;

class PageController extends Controller
{
    public function __construct(private SchemaService $schema) {}

    public function about()
    {
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'About'],
        ];

        $schemas = [
            $this->schema->organization(),
            $this->schema->breadcrumbs($breadcrumbs),
        ];

        return view('pages.about', compact('breadcrumbs', 'schemas'));
    }

    public function show(Page $page)
    {
        if (! $page->is_published) {
            abort(404);
        }

        $page->load('faqs');

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => $page->title],
        ];

        $schemas = [
            $this->schema->organization(),
            $this->schema->breadcrumbs($breadcrumbs),
        ];

        if ($page->faqs->isNotEmpty()) {
            $schemas[] = $this->schema->faq($page->faqs);
        }

        $view = match ($page->slug) {
            'about-us' => 'pages.about',
            'privacy' => 'pages.show',
            default => 'pages.show',
        };

        // return view('pages.show', compact('page', 'breadcrumbs', 'schemas'));
        return view($view, compact('page', 'breadcrumbs', 'schemas'));
    }
}
