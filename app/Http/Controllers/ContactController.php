<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use App\Services\SchemaService;

class ContactController extends Controller
{
    public function __construct(private SchemaService $schema) {}

    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Contact'],
        ];

        $schemas = [
            $this->schema->organization(),
            $this->schema->breadcrumbs($breadcrumbs),
        ];

        return view('pages.contact', compact('breadcrumbs', 'schemas'));
    }

    public function store(ContactRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Thank you for reaching out. We will get back to you soon.');
    }
}
