@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Запросы на выгрузку данных</h1>
</div>

<div class="table-responsive">
  @include('inc.messages')
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#ID</th>
        <th>Имя пользователя</th>
        <th>Email</th>
        <th>Текст</th>
        <th>Статус</th>
        <th>Дата создания</th>
        <th>Опции</th>
      </tr>
    </thead>
    <tbody>
      @forelse($unloadingList as $unloading)
      <form method="post" action="{{ route('admin.unloadings.update', ['unloading' => $unloading]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <tr>
          <td>{{ $unloading->id }}</td>
          <td>{{ $unloading->name }}</td>
          <td>{{ $unloading->email }}</td>
          <td>{{ $unloading->text }}</td>
          <td>
              <div class="form-group">
                <select class="form-control" name="status" id="status">
                    <option @if($unloading->status === 'COMPLETED') selected @endif>COMPLETED</option>
                    <option @if($unloading->status  === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($unloading->status  === 'ASSIGNED') selected @endif>ASSIGNED</option>
                </select>
              </div>
          </td>
          <td>@if($unloading->created_at) {{ $unloading->created_at->format('d-m-Y H:i') }} @endif</td>
          <td>
            <button type="submit" class="btn btn-secondary">Сохранить статус</button>
          </td>
        </form>
        @empty
        <tr><td colspan="4">Записей нет</td></tr>

      @endforelse

    </tbody>
  </table>
  {{ $unloadingList->links() }}
</div>
@endsection