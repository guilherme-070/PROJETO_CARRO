@extends('templates.main')

@section('content')

<form action="{{route('marca.store')}}"method="POST">
    @csrf
    <label class="mt-3">Nome</label>
    <input type="text" name="name"  class="form-control"/>

    <input type="submit" value="Salvar" class="btn btn-success mt-1">
    
</form>

@endsection