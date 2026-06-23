<nav class="breadcrumbs container" aria-label="Breadcrumb">
    <ol>
        @foreach($items as $item)
            <li>
                @if(isset($item['url']))
                    <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                @else
                    <span aria-current="page">{{ $item['name'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
