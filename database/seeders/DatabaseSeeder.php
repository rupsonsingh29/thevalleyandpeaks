<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Rupson Singh',
            'email' => 'admin@thevalleyandpeaks.com',
            'password' => Hash::make('password'),
        ]);

        $author = Author::create([
            'name' => 'Rupson Singh',
            'slug' => 'rupson-singh',
            'email' => 'hello@thevalleyandpeaks.com',
            'title' => 'Founder & Travel Writer',
            'bio' => 'A 23-year-old native from Patan, Nepal, hospitality graduate, and avid food enthusiast with a deep passion for exploring destinations, cultures, landscapes, and local cuisines.',
            'instagram' => 'https://instagram.com/thevalleyandpeaks',
            'twitter' => 'https://twitter.com/thevalleyandpeaks',
            'facebook' => 'https://facebook.com/thevalleyandpeaks',
        ]);

        $nepalCategories = [
            ['name' => 'Travel Guides', 'slug' => 'travel-guides'],
            ['name' => 'Trekking', 'slug' => 'trekking'],
            ['name' => 'Food', 'slug' => 'food'],
            ['name' => 'Hotels', 'slug' => 'hotels'],
            ['name' => 'Culture', 'slug' => 'culture'],
            ['name' => 'Hidden Gems', 'slug' => 'hidden-gems'],
        ];

        $nepalCats = [];
        foreach ($nepalCategories as $i => $cat) {
            $nepalCats[$cat['slug']] = Category::create([
                'name' => $cat['name'],
                'slug' => $cat['slug'],
                'type' => 'nepal',
                'sort_order' => $i + 1,
                'description' => "Explore {$cat['name']} from Nepal on The Valley & Peaks.",
            ]);
        }

        $continents = ['asia', 'europe', 'north-america', 'south-america', 'africa', 'oceania'];
        $intlCats = [];
        foreach ($continents as $i => $continent) {
            $intlCats[$continent] = Category::create([
                'name' => ucwords(str_replace('-', ' ', $continent)),
                'slug' => $continent,
                'type' => 'international',
                'sort_order' => $i + 1,
                'description' => "Travel guides and stories from ".ucwords(str_replace('-', ' ', $continent)).'.',
            ]);
        }

        $nepalDestinations = [
            'Kathmandu', 'Pokhara', 'Chitwan', 'Mustang', 'Everest Region',
            'Annapurna Region', 'Langtang', 'Lumbini', 'Ilam', 'Rara',
        ];

        $destinations = [];
        foreach ($nepalDestinations as $i => $name) {
            $slug = Str::slug($name);
            $destinations[$slug] = Destination::create([
                'name' => $name,
                'slug' => $slug,
                'type' => 'nepal',
                'excerpt' => "Discover the beauty, culture, and adventures of {$name}, Nepal.",
                'content' => "<p>{$name} is one of Nepal's most remarkable destinations, offering travelers a unique blend of natural beauty, cultural heritage, and authentic experiences.</p><h2 id=\"overview\">Overview</h2><p>From ancient temples to breathtaking landscapes, {$name} invites exploration at every turn.</p><h2 id=\"getting-there\">Getting There</h2><p>Access routes and transportation options vary by season and region.</p><h2 id=\"best-time\">Best Time to Visit</h2><p>The ideal time depends on your interests — trekking, wildlife, or cultural exploration.</p>",
                'is_featured' => $i < 4,
                'sort_order' => $i + 1,
                'meta_title' => "{$name} Travel Guide | The Valley & Peaks",
                'meta_description' => "Complete travel guide to {$name}, Nepal. Tips, itineraries, and insider recommendations.",
            ]);
        }

        $intlDestinations = [
            ['name' => 'Bali', 'continent' => 'asia', 'country' => 'Indonesia'],
            ['name' => 'Kyoto', 'continent' => 'asia', 'country' => 'Japan'],
            ['name' => 'Paris', 'continent' => 'europe', 'country' => 'France'],
            ['name' => 'Santorini', 'continent' => 'europe', 'country' => 'Greece'],
            ['name' => 'New York', 'continent' => 'north-america', 'country' => 'USA'],
            ['name' => 'Patagonia', 'continent' => 'south-america', 'country' => 'Argentina'],
            ['name' => 'Marrakech', 'continent' => 'africa', 'country' => 'Morocco'],
            ['name' => 'Queenstown', 'continent' => 'oceania', 'country' => 'New Zealand'],
        ];

        foreach ($intlDestinations as $i => $dest) {
            $slug = Str::slug($dest['name']);
            $destinations[$slug] = Destination::create([
                'name' => $dest['name'],
                'slug' => $slug,
                'type' => 'international',
                'continent' => $dest['continent'],
                'country' => $dest['country'],
                'excerpt' => "Explore {$dest['name']}, {$dest['country']} with our in-depth travel guide.",
                'content' => "<p>{$dest['name']} offers travelers an unforgettable journey through culture, cuisine, and landscapes.</p>",
                'is_featured' => true,
                'sort_order' => $i + 1,
            ]);
        }

        $sampleArticles = [
            [
                'title' => 'The Ultimate Kathmandu Travel Guide for First-Time Visitors',
                'slug' => 'kathmandu-travel-guide',
                'category' => 'travel-guides',
                'destination' => 'kathmandu',
                'excerpt' => 'Everything you need to know before visiting Nepal\'s vibrant capital — from temples and markets to the best local food.',
                'featured' => true,
                'trending' => true,
            ],
            [
                'title' => 'Annapurna Base Camp Trek: A Complete Guide',
                'slug' => 'annapurna-base-camp-trek-guide',
                'category' => 'trekking',
                'destination' => 'annapurna-region',
                'excerpt' => 'Plan your ABC trek with confidence — routes, permits, packing lists, and insider tips from the trail.',
                'featured' => true,
                'trending' => true,
            ],
            [
                'title' => 'Where to Eat in Pokhara: A Food Lover\'s Guide',
                'slug' => 'pokhara-food-guide',
                'category' => 'food',
                'destination' => 'pokhara',
                'excerpt' => 'From lakeside cafes to hidden local eateries, discover the best food experiences in Pokhara.',
                'featured' => false,
                'trending' => true,
            ],
            [
                'title' => 'Best Boutique Hotels in Kathmandu Valley',
                'slug' => 'best-boutique-hotels-kathmandu',
                'category' => 'hotels',
                'destination' => 'kathmandu',
                'excerpt' => 'Handpicked boutique stays that combine comfort, character, and authentic Nepali hospitality.',
                'featured' => true,
                'trending' => false,
            ],
            [
                'title' => 'Mustang: Nepal\'s Forbidden Kingdom',
                'slug' => 'mustang-nepal-forbidden-kingdom',
                'category' => 'hidden-gems',
                'destination' => 'mustang',
                'excerpt' => 'Explore the ancient kingdom of Mustang — a landscape of desert canyons, Tibetan culture, and timeless beauty.',
                'featured' => true,
                'trending' => false,
            ],
            [
                'title' => 'Everest Region Trekking: Routes Compared',
                'slug' => 'everest-region-trekking-routes',
                'category' => 'trekking',
                'destination' => 'everest-region',
                'excerpt' => 'EBC, Gokyo Lakes, Three Passes — which Everest trek is right for you?',
                'featured' => false,
                'trending' => true,
            ],
        ];

        foreach ($sampleArticles as $data) {
            $content = $this->buildArticleContent($data['title']);

            $article = Article::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'excerpt' => $data['excerpt'],
                'content' => $content,
                'author_id' => $author->id,
                'category_id' => $nepalCats[$data['category']]->id,
                'reading_time' => rand(8, 15),
                'status' => 'published',
                'is_featured' => $data['featured'],
                'is_trending' => $data['trending'],
                'published_at' => now()->subDays(rand(1, 30)),
                'content_updated_at' => now()->subDays(rand(0, 5)),
                'views' => rand(500, 5000),
                'meta_title' => $data['title'].' | The Valley & Peaks',
                'meta_description' => $data['excerpt'],
            ]);

            if (isset($destinations[$data['destination']])) {
                $article->destinations()->attach($destinations[$data['destination']]->id);
            }

            Faq::create([
                'faqable_type' => Article::class,
                'faqable_id' => $article->id,
                'question' => "What is the best time to visit for this guide?",
                'answer' => 'The ideal season depends on your activities. Spring (March-May) and autumn (September-November) offer the best weather for most Nepal destinations.',
                'sort_order' => 1,
            ]);

            Faq::create([
                'faqable_type' => Article::class,
                'faqable_id' => $article->id,
                'question' => 'Do I need a guide for this destination?',
                'answer' => 'While independent travel is possible in many areas, hiring a local guide enhances cultural understanding and supports local communities.',
                'sort_order' => 2,
            ]);
        }

        Faq::create([
            'faqable_type' => Destination::class,
            'faqable_id' => $destinations['kathmandu']->id,
            'question' => 'How many days do I need in Kathmandu?',
            'answer' => 'We recommend at least 3-4 days to explore the main temples, markets, and nearby heritage sites at a comfortable pace.',
            'sort_order' => 1,
        ]);

        $pages = [
            ['title' => 'Privacy Policy', 'slug' => 'privacy-policy'],
            ['title' => 'Terms and Conditions', 'slug' => 'terms-and-conditions'],
            ['title' => 'Disclaimer', 'slug' => 'disclaimer'],
            ['title' => 'Affiliate Disclosure', 'slug' => 'affiliate-disclosure'],
        ];

        foreach ($pages as $page) {
            Page::create([
                'title' => $page['title'],
                'slug' => $page['slug'],
                'content' => "<p>This is the {$page['title']} for The Valley & Peaks. Content should be reviewed and updated by legal counsel before launch.</p>",
                'is_published' => true,
            ]);
        }
    }

    private function buildArticleContent(string $title): string
    {
        return <<<HTML
<p>Welcome to our comprehensive guide on {$title}. This article draws from firsthand experiences, local insights, and careful research to help you plan an unforgettable journey.</p>

<h2 id="introduction">Introduction</h2>
<p>Travel is about more than checking destinations off a list. It's about connecting with places, people, and cultures in meaningful ways. This guide is designed to help you do exactly that.</p>

<h2 id="planning-your-trip">Planning Your Trip</h2>
<p>Start by considering your travel style, budget, and the experiences that matter most to you. Whether you prefer slow travel or action-packed adventures, proper planning ensures a smoother journey.</p>

<h3 id="budget-tips">Budget Tips</h3>
<p>Nepal and many international destinations offer excellent value. Book accommodations in advance during peak season, eat where locals eat, and consider shoulder seasons for better rates.</p>

<h3 id="packing-essentials">Packing Essentials</h3>
<p>Layered clothing, comfortable walking shoes, and a reusable water bottle are essentials. For trekking, invest in quality gear and break in your boots before departure.</p>

<h2 id="things-to-do">Things to Do</h2>
<p>From sunrise viewpoints to hidden alleyways, every destination has its own rhythm. Allow time for spontaneous discoveries — they often become the highlights of any trip.</p>

<h2 id="where-to-stay">Where to Stay</h2>
<p>We recommend a mix of boutique hotels, guesthouses, and locally-owned accommodations that reflect the character of each destination.</p>

<h2 id="final-thoughts">Final Thoughts</h2>
<p>Travel with curiosity, respect local customs, and leave places better than you found them. The Valley & Peaks is here to guide every step of your journey.</p>
HTML;
    }
}
