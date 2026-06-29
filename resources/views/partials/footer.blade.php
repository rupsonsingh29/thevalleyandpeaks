<footer class="site-footer">
    <div class="container">
        <div class="site-footer__grid">
            <div>
                <div class="site-footer__brand">The Valley & Peaks</div>
                <p class="site-footer__desc">
                    Authentic travel guides, destination insights, and unforgettable adventures from Nepal and around the world.
                </p>
            </div>

            <div>
                <h4 class="site-footer__heading">Explore</h4>
                <ul class="site-footer__links">
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="site-footer__heading">Destinations</h4>
                <ul class="site-footer__links">
                    <li><a href="{{ route('destinations.nepal') }}">Nepal</a></li>
                    <li><a href="{{ route('destinations.international') }}">International</a></li>
                    {{-- <li><a href="{{ route('destinations.show', 'kathmandu') }}">Kathmandu</a></li>
                    <li><a href="{{ route('destinations.show', 'pokhara') }}">Pokhara</a></li> --}}
                </ul>
            </div>

            <div>
                <h4 class="site-footer__heading">Legal</h4>
                <ul class="site-footer__links">
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                    <li><a href="{{ route('affiliate') }}">Affiliate Disclosure</a></li>
                </ul>
            </div>
        </div>

        <div class="site-footer__bottom">
            <span>The Valley & Peaks &copy; {{ date('Y') }} All Rights Reserved.</span>
        </div>
    </div>
</footer>
