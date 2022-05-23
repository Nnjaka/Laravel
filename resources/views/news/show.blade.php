@extends('layouts.app')
@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
      <h1 class="display-5 fw-bold">{{ $news->title }}</h1>
      <img src="{{ $news->image }}" class="card-img-top" alt="...">
      <p class="col-md-8 fs-4">{{ $news->description }}</p>
      <div class="d-flex justify-content-between align-items-center">
        <small class="text-muted">{{ $news->category->title }}</small>
        <small class="text-muted">{{ $news->author }}</small>
        <small class="text-muted">{{ $news->created_at }}</small>
    </div>
</div>
@endsection