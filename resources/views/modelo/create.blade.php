@extends('templates.main')

@section('content')

<form action="{{route('modelo.store')}}"method="POST">
    @csrf
    <label class="mt-3">Nome</label>
    <input type="text" name="name"  class="form-control"/>

    <label class="mt-3">Marca</label>
    <select name="marca">
        <option selected disabled></option>   
       @foreach ($marcas as $item)
           <option value="{{$item->id}}">{{$item->name}}</option>
       @endforeach
       </select>

    <input type="submit" value="Salvar" class="btn btn-success mt-1">
    
</form>

@endsection