@extends('layouts.app')

@section('title', 'Nepal Travel Destinations | The Valley & Peaks')
@section('meta_description', 'Complete travel guides to Kathmandu, Pokhara, Mustang, Everest Region, Annapurna, and more Nepal destinations.')

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">Nepal</p>
            <h1 class="hero__title">Nepal Destinations</h1>
            <p class="hero__subtitle">From ancient cities to the world's highest peaks — discover Nepal's most remarkable places.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid--3">
            @foreach($destinations as $destination)
                <x-destination-card :destination="$destination" />
            @endforeach
        </div>
    </div>
</section>
@endsection
