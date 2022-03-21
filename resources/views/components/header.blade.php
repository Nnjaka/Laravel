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
                  <li class="nav-item">
                      <a class="nav-link" href=" {{ route('news.category', ['category' => 'inWorld']) }}">В мире</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href=" {{ route('news.category', ['category' => 'politics']) }}">Политика</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href=" {{ route('news.category', ['category' => 'economy']) }}">Экономика</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href=" {{ route('news.category', ['category' => 'science']) }}">Наука</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href=" {{ route('news.category', ['category' => 'sport']) }}">Спорт</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  </header>