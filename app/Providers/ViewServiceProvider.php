<?php

namespace App\Providers;

use App\Models\Destination;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('partials.header', function ($view) {
            $nepalByType = Destination::nepal()
                ->orderBy('sort_order', 'asc')
                ->get()
                ->groupBy('nepal_type');

            $internationalDestinations = Destination::international()
                ->orderBy('sort_order', 'asc')
                ->get();

            $view->with([
                'headerNepalByType' => $nepalByType,
                'headerInternational' => $internationalDestinations,
            ]);
        });
    }
}
