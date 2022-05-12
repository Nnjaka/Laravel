@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать запись - {{ $user->id }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Имя пользователя</label>
             <input type="text" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{ $user->name }}">
             @error('name') <strong style="color:red;">{{ $message }}</strong>@enderror
         </div>
         <div class="form-group">
             <label for="email">Email</label>
             <input type="email" class="form-control @if($errors->has('email')) alert-danger @endif" name="email" id="email" value="{{ $user->email }}">
             @error('email') <strong style="color:red;">{{ $message }}</strong>@enderror
         </div>
         <div class="form-group">
             <label for="password">Пароль</label>
             <input type="password" class="form-control @if($errors->has('password')) alert-danger @endif" name="password" id="password">
             @error('password') <strong style="color:red;">{{ $message }}</strong>@enderror
         </div>
         <div class="form-group">
             <label for="password-confirm">Подтвердите пароль</label>
             <input type="password" class="form-control @if($errors->has('password-confirm')) alert-danger @endif" name="password-confirm" id="password-confirm">
             @error('password-confirm') <strong style="color:red;">{{ $message }}</strong>@enderror
         </div>
         <br>
         <div class="form-check">
             <input class="form-check-input" type="checkbox" name="is-admin" id="is-admin" {{ old('is-admin') ? 'checked' : '' }}>
             <label class="form-check-label" for="is-admin">
                 {{ __('Назначить администратором') }}
             </label>
         </div>

        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection