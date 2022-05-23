@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Обратная связь</h1>
</div>

<div class="table-responsive">
  @include('inc.messages')
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#ID</th>
        <th>Имя пользователя</th>
        <th>Текст</th>
     
      </tr>
    </thead>
    <tbody>
      @forelse($feedbackList as $feedback)
        <tr>
          <td>{{ $feedback->id }}</td>
          <td>{{ $feedback->name }}</td>
          <td>{{ $feedback->text }}</td>
          
        @empty
        <tr><td colspan="4">Записей нет</td></tr>

      @endforelse

    </tbody>
  </table>
  {{ $feedbackList->links() }}
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    const id = this.getAttribute("rel");
                    if(confirm(`Подтвердите удаление записи с #ID ${id} ?`)) {
                        //send id on backend
                        send(`/admin/categories/${id}`).then(() => {
                            alert("Запись была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush 