{{-- @extends('layouts.app')

@section('title', 'About Rupson Singh | The Valley & Peaks')
@section('meta_description', 'Meet Rupson Singh, founder of The Valley & Peaks — a hospitality graduate from Patan, Nepal sharing authentic travel guides and food stories.')

@section('content')
<section class="about-hero">
    <div class="container container--narrow">
        <div class="about-avatar">R</div>
        <h1>About Rupson</h1>
    </div>
</section>

<section class="section">
    <div class="container container--narrow">
        <div class="article-content">
            <p>Hello, I'm <strong>Rupson Singh</strong>.</p>

            <p>I am a 23-year-old native from Patan, Nepal, a hospitality graduate, and an avid food enthusiast with a deep passion for exploring destinations, cultures, landscapes, and local cuisines.</p>

            <p>Through The Valley & Peaks, I share practical travel guides, destination insights, hotel recommendations, trekking experiences, cultural discoveries, and food stories from Nepal and around the world.</p>

            <p>My goal is to help travelers make informed decisions, discover authentic experiences, and travel with confidence.</p>

            <p>Whether you're planning a mountain adventure, a city escape, a cultural journey, or searching for the best local food experiences, you'll find carefully researched and experience-driven content here.</p>

            <p>The Valley & Peaks is more than a travel blog. It is a growing collection of stories, guides, and resources designed to inspire meaningful travel experiences.</p>
        </div>
    </div>
</section>
@endsection --}}


@extends('layouts.app')

@section('title', ($page->meta_title ?? $page->title).' | The Valley & Peaks')
@section('meta_description', 'Meet Rupson Singh, founder of The Valley & Peaks — a hospitality graduate from Patan, Nepal sharing authentic travel guides and food stories.')


@section('content')
<section class="about-hero">
    <div class="container">
        <h1>{{ $page->title }}</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-content">
            {!! $page->content !!}
        </div>

        @include('partials.faq', ['faqs' => $page->faqs])
    </div>
</section>
@endsection