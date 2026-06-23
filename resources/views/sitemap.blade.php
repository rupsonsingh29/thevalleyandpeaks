@foreach($urls as $url)
    @php
        $loc      = $url['loc'];
        $lastmod  = $url['lastmod'] ?? null;
        $priority = $url['priority'] ?? '0.5';
    @endphp
    <url>
        <loc>{{ $loc }}</loc>
        @if($lastmod)
        <lastmod>{{ $lastmod }}</lastmod>
        @endif
        <changefreq>weekly</changefreq>
        <priority>{{ $priority }}</priority>
    </url>
@endforeach