<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Destination;
use App\Services\SchemaService;

class DestinationController extends Controller
{
    public function __construct(private SchemaService $schema) {}

    public function index()
    {
        $nepalDestinations = Destination::nepal()->orderBy('sort_order')->get();
        $continents = Destination::international()
            ->select('continent')
            ->distinct()
            ->orderBy('continent')
            ->pluck('continent');

        $internationalByContinent = $continents->mapWithKeys(fn ($continent) => [
            $continent => Destination::international()->byContinent($continent)->orderBy('sort_order')->get(),
        ]);

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Destinations'],
        ];

        $schemas = [
            $this->schema->organization(),
            $this->schema->breadcrumbs($breadcrumbs),
        ];

        return view('destinations.index', compact(
            'nepalDestinations',
            'internationalByContinent',
            'breadcrumbs',
            'schemas',
        ));
    }

    public function nepal()
    {
        $destinations = Destination::nepal()->orderBy('sort_order')->get();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Destinations', 'url' => route('destinations.index')],
            ['name' => 'Nepal'],
        ];

        return view('destinations.nepal', compact('destinations', 'breadcrumbs'));
    }

    public function international()
    {
        $continents = Destination::international()
            ->select('continent')
            ->distinct()
            ->orderBy('continent')
            ->pluck('continent');

        $destinationsByContinent = $continents->mapWithKeys(fn ($continent) => [
            $continent => Destination::international()->byContinent($continent)->orderBy('sort_order')->get(),
        ]);

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Destinations', 'url' => route('destinations.index')],
            ['name' => 'International'],
        ];

        return view('destinations.international', compact('destinationsByContinent', 'breadcrumbs'));
    }

    public function continent(string $continent)
    {
        $destinations = Destination::international()
            ->byContinent($continent)
            ->orderBy('sort_order')
            ->get();

        $articles = Article::published()
            ->whereHas('destinations', fn ($q) => $q->where('continent', $continent))
            ->latest()
            ->take(6)
            ->get();

        $continentLabel = ucwords(str_replace('-', ' ', $continent));

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Destinations', 'url' => route('destinations.index')],
            ['name' => 'International', 'url' => route('destinations.international')],
            ['name' => $continentLabel],
        ];

        return view('destinations.continent', compact('destinations', 'articles', 'continent', 'continentLabel', 'breadcrumbs'));
    }

    public function show(Destination $destination)
    {
        $destination->load('faqs');
        $articles = Article::published()
            ->whereHas('destinations', fn ($q) => $q->where('destinations.id', $destination->id))
            ->latest()
            ->take(6)
            ->get();

        $relatedDestinations = Destination::where('type', $destination->type)
            ->where('id', '!=', $destination->id)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Destinations', 'url' => route('destinations.index')],
        ];

        if ($destination->type === 'nepal') {
            $breadcrumbs[] = ['name' => 'Nepal', 'url' => route('destinations.nepal')];
        } else {
            $breadcrumbs[] = ['name' => 'International', 'url' => route('destinations.international')];
            $breadcrumbs[] = ['name' => ucwords(str_replace('-', ' ', $destination->continent)), 'url' => route('destinations.continent', $destination->continent)];
        }

        $breadcrumbs[] = ['name' => $destination->name];

        $schemas = [
            $this->schema->organization(),
            $this->schema->destination($destination),
            $this->schema->breadcrumbs($breadcrumbs),
        ];

        if ($destination->faqs->isNotEmpty()) {
            $schemas[] = $this->schema->faq($destination->faqs);
        }

        return view('destinations.show', compact('destination', 'articles', 'relatedDestinations', 'breadcrumbs', 'schemas'));
    }
}
