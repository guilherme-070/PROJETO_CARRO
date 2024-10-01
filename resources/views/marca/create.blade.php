@extends('templates.main')

@section('content')

<form action="{{route('marca.store')}}"method="POST">
    @csrf
    <label class="mt-3">Nome</label>
    <input type="text" value="{{ old('name') }}" name="name" class="form-control {{$errors->has('name') ? 'is-invalid': ''}}"/>
    @if ($errors->has('name'))
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    @endif

    <input type="submit" value="Salvar" class="btn btn-success mt-1">

</form>

@endsection
