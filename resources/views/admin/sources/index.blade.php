@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список ресурсов</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить ресурс</a>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    @include('inc.messages')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Кол-во новостей</th>
            <th>Ресурс</th>
            <th>Адрес</th>
            <th>Статус</th>
            <th>Дата редактирования</th>
            <th>Опции</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sources as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->news_count }}</td>
                <td>{{ $source->name }}</td>
                <td>{{ $source->url }}</td>
                <td>{{ $source->status }}</td>
                <td>@if($source->updated_at) {{ $source->updated_at->format('d-m-Y H:i') }} @endif</td>
                <td>
                    <a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Ред.</a>
                    &nbsp;
                    <a href="javascript:;" style="color:red;">Удл.</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Записей нет</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $sources->links() }}
</div>
@endsection