@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
      </div>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse ($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ $news->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <strong><a href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a></h5> </strong>
                    <p class="card-text">{{ $news->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                        </div>
                        <small class="text-muted">{{ $news->status }}</small>
                        <small class="text-muted">{{ $news->author }}</small>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h2>Новостей нет</h2>
    @endforelse 
</div>
@endsection