<?php

namespace App\Providers;

use Filament\Forms\Components\DateTimePicker;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\Tables\Columns\TextColumn;
use Filament\View\PanelsRenderHook;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.simple-default');
        Paginator::defaultSimpleView('vendor.pagination.simple-default');

        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn () => new HtmlString('
        <script>
            document.cookie = "timezone=" + Intl.DateTimeFormat().resolvedOptions().timeZone 
                + "; path=/; SameSite=Lax";
        </script>
    ')
        );

        DateTimePicker::configureUsing(function (DateTimePicker $component): void {
            $component->timezone(session('timezone', config('app.timezone')));
        });

        TextColumn::configureUsing(function (TextColumn $component): void {
            $component->timezone(session('timezone', config('app.timezone')));
        });

        FilamentAsset::register([
            Js::make('rich-content-plugins/heading-id', __DIR__.'/../../resources/js/dist/filament/rich-content-plugins/heading-id.js')
                ->loadedOnRequest(),
        ]);
    }
}
