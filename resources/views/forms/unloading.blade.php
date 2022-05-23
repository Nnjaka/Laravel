@extends('layouts.app')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@include('inc.messages')
    <h1 class="fw-light px-5">Запросить выгрузку</h1>
    <br> <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form method="POST" action="{{ route('unloading.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" class="form-control" name="name" id="name" required>
                @error('name') <strong style="color:red;">{{ $message }}</strong>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="email">Адрес электронной почты</label>
                <input type="email" class="form-control" name="email" id="email" required>
                @error('email') <strong style="color:red;">{{ $message }}</strong>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="text">Информация, которую вы хотите получить</label>
                <textarea class="form-control" name="text" is="text" required></textarea>
                @error('text') <strong style="color:red;">{{ $message }}</strong>@enderror
           </div>
            <br> <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection