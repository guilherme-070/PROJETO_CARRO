@extends('templates.main')

@section('content')

<form action="{{route('modelo.update', $modelo->id)}}"method="POST">
    @csrf
    @method('PUT')
    <label class="mt-3">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$modelo->name}}"/>
    <label class="mt-3">Marca</label>
    <select name="marca" class="form-control">
        <option selected disabled></option>
    @foreach ($marcas as $item)
        @if($item->id == $modelo->marca_id)
        <option value="{{$item->id}}" selected> {{$item->name}}</option>
        @else
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endif
    @endforeach
    </select>


<input type="submit" value="Alterar" class="btn btn-success mt-1">
</form>

@endsection
