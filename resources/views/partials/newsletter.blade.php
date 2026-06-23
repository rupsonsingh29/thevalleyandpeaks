<section class="newsletter" aria-labelledby="newsletter-heading">
    <div class="container">
        <div class="newsletter__inner">
            <h2 id="newsletter-heading" class="newsletter__title">Join thousands of travelers discovering unforgettable destinations.</h2>
            <p class="newsletter__desc">Get curated travel guides, hidden gems, and insider tips delivered to your inbox.</p>

            @if(session('newsletter_success'))
                <div class="alert alert--success">{{ session('newsletter_success') }}</div>
            @endif

            <form action="{{ route('newsletter.store') }}" method="POST" class="newsletter__form">
                @csrf
                <input type="email" name="email" placeholder="Your email address" required aria-label="Email address">
                <button type="submit" class="btn btn--primary">Subscribe</button>
            </form>
        </div>
    </div>
</section>
