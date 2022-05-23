<nav class="navbar fixed-bottom navbar-dark bg-dark mt-0">
  <div class="container">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link px-2 text-muted">Главная</a></li>
      <li class="nav-item"><a href="{{ route('news') }}" class="nav-link px-2 text-muted">Все новости</a></li>
      <li class="nav-item"><a href="{{ route('feedback') }}" class="nav-link px-2 text-muted">Обратная связь</a></li>
      <li class="nav-item"><a href="{{ route('unloading') }}" class="nav-link px-2 text-muted">Получение выгрузки</a></li>
    </ul>
    <p class="text-center text-muted">&copy; {{date('Y')}} NEWS</p>
  </div>
</nav>