@extends('layouts.app')

@section('title', ($page->meta_title ?? $page->title).' | The Valley & Peaks')
@section('meta_description', $page->meta_description ?? $page->title)

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__title">{{ $page->title }}</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container container--narrow">
        <div class="article-content">
            {!! $page->content !!}
        </div>
        @include('partials.faq', ['faqs' => $page->faqs])
    </div>
</section>
@endsection
