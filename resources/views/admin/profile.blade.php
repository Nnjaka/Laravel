@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Изменение учетных данных</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.updateProfile', ['user' => $user]) }}">
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
             <label for="password">Текущий пароль</label>
             <input type="password" class="form-control @if($errors->has('password')) alert-danger @endif" name="password" id="password">
             @error('password') <strong style="color:red;">{{ $message }}</strong>@enderror
         </div>
         <div class="form-group">
             <label for="newPassword">Новый пароль</label>
             <input type="password" class="form-control @if($errors->has('newPassword')) alert-danger @endif" name="newPassword" id="newPassword">
             @error('newPassword') <strong style="color:red;">{{ $message }}</strong>@enderror
         </div>

        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection