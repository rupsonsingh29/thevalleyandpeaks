{{--
    Newsletter inline section + popup.
    Include ONCE per page (it also renders the popup markup).

    Usage: @include('partials.newsletter')

    Requires a POST route named "newsletter.subscribe" — see notes below
    the widget in chat for a minimal controller/migration example.
--}}

<section class="newsletter-inline">
    <div class="container">
        <div class="newsletter-inline__box">
            <div class="newsletter-inline__text">
                <h3>Get travel inspiration in your inbox</h3>
                <p>New destination guides, travel tips, and stories from The Valley &amp; Peaks — no spam, unsubscribe anytime.</p>
            </div>

            <form class="newsletter-form newsletter-inline__form" action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <input type="hidden" name="source" value="article_inline">
                <input type="email" name="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<div class="newsletter-popup" id="newsletterPopup" role="dialog" aria-modal="true" aria-labelledby="newsletterPopupTitle" hidden>
    <div class="newsletter-popup__backdrop" data-newsletter-close></div>

    <div class="newsletter-popup__panel">
        <button type="button" class="newsletter-popup__close" data-newsletter-close aria-label="Close">&times;</button>

        <div class="newsletter-popup__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6">
                <rect x="3" y="5" width="18" height="14" rx="2"/>
                <path d="m3 7 9 6 9-6"/>
            </svg>
        </div>

        <h3 id="newsletterPopupTitle">Don't miss a destination</h3>
        <p>Subscribe for new travel guides and insider tips, straight to your inbox.</p>

        <form class="newsletter-form newsletter-popup__form" action="{{ route('newsletter.subscribe') }}" method="POST">
            @csrf
            <input type="hidden" name="source" value="article_popup">
            <input type="email" name="email" placeholder="Your email address" required>
            <button type="submit">Subscribe</button>
        </form>

        <button type="button" class="newsletter-popup__later" data-newsletter-close>Maybe later</button>
    </div>
</div>