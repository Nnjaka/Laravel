@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать запись - {{ $source->id }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Имя ресурса</label>
            <input type="text" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{ $source->name }}">
            @error('name') <strong style="color:red;">{{ $message }}</strong>@enderror
        </div>
        <div class="form-group">
            <label for="url">Адрес</label>
            <input type="text" class="form-control @if($errors->has('url')) alert-danger @endif" name="url" id="url" value="{{ $source->url }}">
            @error('url') <strong style="color:red;">{{ $message }}</strong>@enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if($source->status === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if($source->status  === 'INACTIVE') selected @endif>INACTIVE</option>
                <option @if($source->status  === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>

        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection