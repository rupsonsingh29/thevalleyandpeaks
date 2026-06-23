<header class="site-header">
    <div class="site-header__inner">
        <a href="{{ route('home') }}" class="site-logo">
            The Valley <span>&</span> Peaks
        </a>

        <nav class="site-nav" aria-label="Main navigation">
            <ul class="site-nav__list">
                <li><a href="{{ route('home') }}" class="site-nav__link {{ request()->routeIs('home') ? 'site-nav__link--active' : '' }}">Home</a></li>
                <li><a href="{{ route('destinations.nepal') }}" class="site-nav__link">Nepal</a></li>
                <li><a href="{{ route('destinations.international') }}" class="site-nav__link">International</a></li>
                <li><a href="{{ route('blog.index') }}" class="site-nav__link {{ request()->routeIs('blog.*') ? 'site-nav__link--active' : '' }}">Blog</a></li>
                <li><a href="{{ route('about') }}" class="site-nav__link {{ request()->routeIs('about') ? 'site-nav__link--active' : '' }}">About</a></li>
                {{-- <li><a href="{{ route('destinations.index') }}" class="site-nav__link {{ request()->routeIs('destinations.*') ? 'site-nav__link--active' : '' }}">Destinations</a></li> --}}
                {{-- <li><a href="{{ route('contact') }}" class="site-nav__link {{ request()->routeIs('contact') ? 'site-nav__link--active' : '' }}">Contact</a></li> --}}
            </ul>

            <div class="site-nav__search">
                <form action="{{ route('search') }}" method="GET" class="search-form" role="search">
                    <input type="search" name="q" placeholder="Search..." value="{{ request('q') }}" aria-label="Search">
                </form>
            </div>

            <button class="menu-toggle" aria-label="Toggle menu" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');

    const handleScroll = () => {
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };

    handleScroll();
    window.addEventListener('scroll', handleScroll);
});
</script>
