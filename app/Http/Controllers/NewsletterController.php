<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        NewsletterSubscriber::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name, 'subscribed_at' => now()]
        );

        return back()->with('newsletter_success', 'Welcome aboard! You have been subscribed to our newsletter.');
    }
}
