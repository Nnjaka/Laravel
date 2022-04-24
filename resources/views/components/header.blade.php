<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center">
          <strong>News</strong>
        </a>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('news') }}">Все новости</a>
                  </li>

                  @foreach ($category as $item)
                  <li class="nav-item">
                      <a class="nav-link" href=" {{ route('news.category', ['category' => $item->id]) }}" value="{{ $item->title }}"></a>
                  </li>
                  @endforeach

              </ul>
          </div>
      </div>
  </nav>
  </header>