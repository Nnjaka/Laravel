@if(session()->has('success'))
    <x-alert type="success" :message="session()->get('success')"></x-alert>
@endif

@if(session()->has('error'))
    <x-alert type="danger" :massage="session()->get('error')"></x-alert>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <x-alert type="danger" :massage="$error"></x-alert>
    @endforeach
@endif