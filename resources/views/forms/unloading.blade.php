@extends('layouts.main')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <h1 class="fw-light px-5">Обратная связь</h1>
    <br> <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form method="POST" action="{{ route('unloading.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <br>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="tel" class="form-control" name="phone" id="phone" required>
            </div>
            <br>
            <div class="form-group">
                <label for="email">Адрес электронной почты</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Информация, которую вы хотите получить</label>
                <textarea class="form-control" name="description" is="description" required></textarea>
           </div>
            <br> <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection