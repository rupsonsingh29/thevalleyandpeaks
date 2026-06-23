<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('destinations')->name('destinations.')->group(function () {
    Route::get('/', [DestinationController::class, 'index'])->name('index');
    Route::get('/nepal', [DestinationController::class, 'nepal'])->name('nepal');
    Route::get('/international', [DestinationController::class, 'international'])->name('international');
    Route::get('/international/{continent}', [DestinationController::class, 'continent'])->name('continent');
    Route::get('/{destination:slug}', [DestinationController::class, 'show'])->name('show');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/{article:slug}', [BlogController::class, 'show'])->name('show');
});

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('/privacy-policy', fn () => app(PageController::class)->show(
    \App\Models\Page::where('slug', 'privacy-policy')->firstOrFail()
))->name('privacy');
Route::get('/terms-and-conditions', fn () => app(PageController::class)->show(
    \App\Models\Page::where('slug', 'terms-and-conditions')->firstOrFail()
))->name('terms');
Route::get('/disclaimer', fn () => app(PageController::class)->show(
    \App\Models\Page::where('slug', 'disclaimer')->firstOrFail()
))->name('disclaimer');
Route::get('/affiliate-disclosure', fn () => app(PageController::class)->show(
    \App\Models\Page::where('slug', 'affiliate-disclosure')->firstOrFail()
))->name('affiliate');
