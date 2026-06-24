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
<script>
document.addEventListener('DOMContentLoaded', () => {
    const breadcrumbs = document.querySelector('.breadcrumbs');


    if (!breadcrumbs ) return;

    let lastScroll = window.scrollY;

   window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
   
    if (currentScroll === 0) {
        // At the very top — hide
          breadcrumbs.classList.remove('hidden');
    } else if (currentScroll > lastScroll) {
        // Scrolling down — hide
               breadcrumbs.classList.add('hidden');
    } else if (currentScroll < lastScroll) {
        // Scrolling up — show
       breadcrumbs.classList.remove('hidden');
    }

    lastScroll = currentScroll;
});
});
</script>