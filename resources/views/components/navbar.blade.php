<div class="navbar-text ">
    <nav class="nav" aria-label="Secondary navigation">
        <a class="nav-link @if(request()->routeIs('news')) active @endif"  aria-current="page" href="{{ route('news') }}">Все новости</a>
        @foreach ($categories as $category)
            <a class="nav-link" aria-current="page"  href="{{ route('news.category', ['category' => $category]) }}">{{ $category->title }}</a>
        @endforeach
    </nav>
</div>