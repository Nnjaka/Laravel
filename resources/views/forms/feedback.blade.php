@extends('layouts.main')
@section('content')
    <h1 class="fw-light px-5">Обратная связь</h1>
    <br> <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form method="POST" action="{{ route('feedback.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Комментарий / отзыв по работе проекта</label>
                <textarea class="form-control" name="description" is="description" required></textarea>
           </div>
            <br> <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection