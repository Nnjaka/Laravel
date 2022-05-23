@extends('layouts.app')
@section('content')
    <div class="row offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br><br>
        
        @if(Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar}}" style="width:250px;">
        @endif
        @if(Auth::user()->is_admin)
            <p><a class="btn mt-2 btn-lg btn-secondary" href="{{ route('admin.index') }}">В админку</a></p>
        @endif
    </div>
    
@endsection