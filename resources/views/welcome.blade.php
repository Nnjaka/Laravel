@extends('layouts.app')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Добро пожаловать в News</h1>
            <p class="lead text-muted">Это новостной портал, где вас ждут только правдивые и актуальные новости со всего мира</p>
            <p>
                <a href=" {{ route('news') }}" class="btn btn-lg btn-secondary">К новостям</a>
            </p>
        </div>
        </div>
    </section>
@endsection