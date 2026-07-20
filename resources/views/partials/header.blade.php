<header class="site-header">
    <div class="site-header__inner">
        <a href="{{ route('home') }}">
            <img src="{{ asset('image/logo/main-logo.png') }}" alt="The Valley & Peaks" class="site-logo">
        </a>

        <nav class="site-nav" aria-label="Main navigation">
            <ul class="site-nav__list">
                <li>
                    <a href="{{ route('home') }}" class="site-nav__link">Home</a>
                    {{-- class="site-nav__link {{ request()->routeIs('home') ? 'site-nav__link--active' : ''
                    }}">Home</a> --}}
                </li>

                {{-- Destinations --}}
                <li class="has-mega">
                    <a href="#" class="site-nav__link ">Destinations</a>
                    {{-- <a href="#"
                        class="site-nav__link {{ request()->routeIs('destinations.*') ? 'site-nav__link--active' : '' }}">Destinations</a>
                    --}}
                    <div class="mega-menu">
                        <div class="mega-menu__inner">
                            <div class="mega-menu__col">
                                <h4>Nepal — Regions</h4>
                                <ul>
                                    @forelse ($headerNepalByType->get('region', []) as $destination)
                                        <li><a
                                                href="{{ route('destinations.show', $destination) }}">{{ $destination->name }}</a>
                                        </li>
                                    @empty
                                        <li class="text-muted">Coming soon</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="mega-menu__col">
                                <h4>Nepal — Cities</h4>
                                <ul>
                                    @forelse ($headerNepalByType->get('cities', []) as $destination)
                                        <li><a
                                                href="{{ route('destinations.show', $destination) }}">{{ $destination->name }}</a>
                                        </li>
                                    @empty
                                        <li class="text-muted">Coming soon</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="mega-menu__col">
                                <h4>More Nepal</h4>
                                <ul>
                                    @forelse ($headerNepalByType->get('others', []) as $destination)
                                        <li><a
                                                href="{{ route('destinations.show', $destination) }}">{{ $destination->name }}</a>
                                        </li>
                                    @empty
                                        <li class="text-muted">Coming soon</li>
                                    @endforelse
                                </ul>
                                <a href="{{ route('destinations.nepal') }}" class="mega-menu__viewall">View all Nepal
                                    destinations →</a>
                            </div>

                            {{-- <div class="mega-menu__col">
                                <h4>International</h4>
                                <ul>
                                    @foreach ($headerInternational as $destination)
                                    <li><a href="{{ route('destinations.show', $destination) }}">{{ $destination->name
                                            }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('destinations.international') }}" class="mega-menu__viewall">View all
                                    destinations →</a>
                            </div> --}}
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ route('under-construction') }}" class="site-nav__link">Experiences</a>
                </li>
                <li>
                    <a href="{{ route('under-construction') }}" class="site-nav__link">Plan Your Trip</a>
                </li>
                <li>
                    <a href="{{ route('under-construction') }}" class="site-nav__link">Tours</a>
                </li>
               

                {{-- Experiences --}}
                {{-- <li class="has-mega">
                    <a href="#" class="site-nav__link">Experiences</a>
                    <div class="mega-menu">
                        <div class="mega-menu__inner">
                            <div class="mega-menu__col">
                                <h4>By Style</h4>
                                <ul>
                                    <li><a href="#">Trekking</a></li>
                                    <li><a href="#">Hiking</a></li>
                                    <li><a href="#">Cultural Tours</a></li>
                                    <li><a href="#">Heritage Walks</a></li>
                                    <li><a href="#">Food Tours</a></li>
                                    <li><a href="#">Spiritual Tours</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__col">
                                <h4>Adventure</h4>
                                <ul>
                                    <li><a href="#">Wildlife</a></li>
                                    <li><a href="#">Adventure Sports</a></li>
                                    <li><a href="#">Photography</a></li>
                                    <li><a href="#">Motorcycle Tours</a></li>
                                    <li><a href="#">Cycling</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__col">
                                <h4>By Traveler</h4>
                                <ul>
                                    <li><a href="#">Luxury Travel</a></li>
                                    <li><a href="#">Budget Travel</a></li>
                                    <li><a href="#">Family Travel</a></li>
                                    <li><a href="#">Solo Travel</a></li>
                                    <li><a href="#">Couple Travel</a></li>
                                    <li><a href="#">Wellness</a></li>
                                    <li><a href="#">Festivals</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> --}}

                {{-- Plan Your Trip --}}
                {{-- <li class="has-mega">
                    <a href="#" class="site-nav__link">Plan Your Trip</a>
                    <div class="mega-menu">
                        <div class="mega-menu__inner">
                            <div class="mega-menu__col">
                                <h4>Essentials</h4>
                                <ul>
                                    <li><a href="#">Nepal Visa</a></li>
                                    <li><a href="#">SIM Cards</a></li>
                                    <li><a href="#">Currency</a></li>
                                    <li><a href="#">Transportation</a></li>
                                    <li><a href="#">Internet</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__col">
                                <h4>Prepare</h4>
                                <ul>
                                    <li><a href="#">Weather</a></li>
                                    <li><a href="#">Best Time to Visit</a></li>
                                    <li><a href="#">Packing Lists</a></li>
                                    <li><a href="#">Travel Insurance</a></li>
                                    <li><a href="#">Permits</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__col">
                                <h4>Safety & Help</h4>
                                <ul>
                                    <li><a href="#">Safety</a></li>
                                    <li><a href="#">Altitude Sickness</a></li>
                                    <li><a href="#">Budget Calculator</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Nepal Travel Guide</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> --}}

                {{-- Tours --}}
                {{-- <li class="has-mega">
                    <a href="#" class="site-nav__link">Tours</a>
                    <div class="mega-menu">
                        <div class="mega-menu__inner">
                            <div class="mega-menu__col">
                                <h4>By Length</h4>
                                <ul>
                                    <li><a href="#">Day Tours</a></li>
                                    <li><a href="#">Multi-Day Tours</a></li>
                                    <li><a href="#">Trekking Packages</a></li>
                                    <li><a href="#">Seasonal Tours</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__col">
                                <h4>By Type</h4>
                                <ul>
                                    <li><a href="#">Luxury Tours</a></li>
                                    <li><a href="#">Private Tours</a></li>
                                    <li><a href="#">Group Tours</a></li>
                                    <li><a href="#">Custom Tours</a></li>
                                    <li><a href="#">Pilgrimage Tours</a></li>
                                    <li><a href="#">Photography Tours</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> --}}

                {{-- Blog --}}
                <li class="has-mega">
                    <a href="#" class="site-nav__link">Blog</a>
                    {{-- class="site-nav__link {{ request()->routeIs('blog.*') ? 'site-nav__link--active' : ''
                    }}">Blog</a> --}}
                    <div class="mega-menu">
                        <div class="mega-menu__inner">

                            <div class="mega-menu__col">
                                <h4>Categories</h4>
                                <ul>
                                    @foreach ($headerNepalCategories as $category)
                                        <li>
                                            <a href="{{ route('blog.category', $category) }}">{{ $category->name }}</a>
                                            @if ($category->children->isNotEmpty())
                                                <ul class="mega-menu__submenu">
                                                    @foreach ($category->children as $child)
                                                        <li><a href="{{ route('blog.category', $child) }}">{{ $child->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="mega-menu__col">
                                <h4>More</h4>
                                <ul>
                                    <li><a href="#">Photography</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Stories</a></li>
                                    <li><a href="#">Trekking</a></li>
                                    <li><a href="#">Adventure</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ route('under-construction') }}" class="site-nav__link">Resources</a>
                </li>

                {{-- Resources --}}
                {{-- <li class="has-mega">
                    <a href="#" class="site-nav__link">Resources</a>
                    <div class="mega-menu">
                        <div class="mega-menu__inner">
                            <div class="mega-menu__col">
                                <h4>Downloads</h4>
                                <ul>
                                    <li><a href="#">Free Travel Guides</a></li>
                                    <li><a href="#">Maps</a></li>
                                    <li><a href="#">Itineraries</a></li>
                                    <li><a href="#">Packing Checklists</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__col">
                                <h4>Tools</h4>
                                <ul>
                                    <li><a href="#">Budget Planners</a></li>
                                    <li><a href="#">Phrasebook</a></li>
                                    <li><a href="#">Trek Difficulty Guides</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> --}}

                {{-- About --}}
                {{-- <li class="has-mega">
                    <a href="{{ route('about') }}"
                        class="site-nav__link {{ request()->routeIs('about') ? 'site-nav__link--active' : '' }}">About</a>
                    <div class="mega-menu">
                        <div class="mega-menu__inner">
                            <div class="mega-menu__col">
                                <ul>
                                    <li><a href="#">Our Story</a></li>
                                    <li><a href="#">Meet the Team</a></li>
                                    <li><a href="#">Why Travel With Us</a></li>
                                    <li><a href="#">Sustainability</a></li>
                                    <li><a href="#">Our Partners</a></li>
                                    <li><a href="#">Press</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> --}}

                <li>
                    <a href="{{ route('about') }}" {{--
                        class="site-nav__link {{ request()->routeIs('about') ? 'site-nav__link--active' : '' }}">About</a>
                    --}}
                    class="site-nav__link ">About</a>
                </li>

                <li><a href="{{ route('under-construction') }}"  class="site-nav__link">Contact</a></li>
            </ul>

            <div class="site-nav__search">
                <button class="search-toggle" type="button" aria-label="Search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L16.65 16.65M18 11C18 14.866 14.866 18 11 18C7.13401 18 4 14.866 4 11C4 7.13401 7.13401 4 11 4C14.866 4 18 7.13401 18 11Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <input type="search" name="q" placeholder="Search..." value="{{ request('q') }}"
                        aria-label="Search">
                </form>
            </div>

            <button class="menu-toggle" aria-label="Toggle menu" type="button">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.querySelector('.site-header');
        const searchToggle = document.querySelector('.search-toggle');
        const searchForm = document.querySelector('.search-form');
        const siteLogo = document.querySelector('.site-logo');
        const searchInput = searchForm.querySelector('input');

        const handleScroll = () => {
            if (window.scrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };

        handleScroll();
        window.addEventListener('scroll', handleScroll);

        searchToggle.addEventListener('click', () => {
            searchForm.classList.toggle('active');
            siteLogo.classList.toggle('active');

            if (searchForm.classList.contains('active')) {
                setTimeout(() => searchInput.focus(), 300);
            }
        });
    });
</script>