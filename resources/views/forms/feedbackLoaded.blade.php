@extends('layouts.main')
@section('content')
    <h1 class="fw-light px-5">Обратная связь</h1>
    <br> <br>
    <div class="col-lg-12 col-md-12 mx-auto">
        <p class="lead text-muted">Ваш отзыв был нами успешно получен. Благодарим за обратную связь!</p>
        <br>
            <p>
                <a href=" {{ route('news') }}" class="btn btn-lg btn-secondary">К новостям</a>
            </p>
    </div>
@endsection