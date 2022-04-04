@extends('layouts.main')
@section('content')
    <h1 class="fw-light px-5">{{ $news->title }}</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ $news->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <strong><a href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a></h5> </strong>
                        <p class="card-text">{{ $news->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $news->status }}</small>
                            <small class="text-muted">{{ $news->author }}</small>
                        </div>
                    </div>
                </div>
            </div>
           
    </div>
@endsection