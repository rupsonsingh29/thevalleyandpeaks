<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;

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
    }
}
