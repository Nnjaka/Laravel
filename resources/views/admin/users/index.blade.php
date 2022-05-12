@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    @include('inc.messages')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Статус администратора</th>
            <th>Дата редактирования</th>
            <th>Опции</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>@if($user->is_admin) Администратор @endif</td>
                <td>@if($user->updated_at) {{ $user->updated_at->format('d-m-Y H:i') }} @endif</td>
                <td>
                    <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Ред.</a>
                    &nbsp;
                    <a href="javascript:;" style="color:red;">Удл.</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Записей нет</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection