@extends('layouts.app')
@section('content')
@include('inc.messages')
    <h1 class="fw-light px-5">Все новости</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse ($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    @if($news->image)
                    <img src="{{ Storage::disk('public')->url($news->image) }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <strong><a class="text-dark" href="{{ route('news.show', ['news' => $news]) }}">{{ $news->title }}</a></h5> </strong>
                        <p class="card-text">{!! $news->description !!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('news.show', ['news' => $news]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            </div>
                            <small class="text-muted">{{ $news->status }}</small>
                            <small class="text-muted">{{ $news->author }}</small>
                            <small class="text-muted">{{ $news->created_at }}</small>
                           
                        </div>
                        <div class="card-text pt-4" style="text-align: right;">{{ $news->category->title }}</div>
                    </div>
                </div>
            </div>

            @empty
                <h2>Новостей нет</h2>
        @endforelse 
        
    </div>
    {{ $newsList->links() }}
@endsection

