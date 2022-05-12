<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
            <span data-feather="home"></span>
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index')}}">
            <span data-feather="list"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index')}}">
            <span data-feather="list"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.sources.*')) active @endif" href="{{ route('admin.sources.index')}}">
            <span data-feather="list"></span>
            Ресурсы
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.parser')) active @endif" href="{{ route('admin.parser')}}">
            <span data-feather="list"></span>
            Парсер
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index')}}">
            <span data-feather="users"></span>
            Пользователи
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.editProfile')) active @endif" href="{{ route('admin.editProfile')}}">
            <span data-feather="settings"></span>
            Изменение учетных данных
          </a>
        </li>
      </ul>
    </div>
  </nav> 