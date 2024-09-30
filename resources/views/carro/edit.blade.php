@extends('templates.main')

@section('content')

<form action="{{route('carro.update', $carro->id)}}"method="POST">


    @csrf
    @method('PUT')

    <label class="mt-3">Placa</label>
    <input type="text" name="placa" class="form-control" value="{{$carro->placa}}"/>

    <label class="mt-3">Modelo</label>
    <select name="modelo" class="form-control">
        <option selected disabled></option>

    @foreach ($modelo as $item)
        @if($item->id == $carro->modelos_id)
        <option value="{{$item->id}}" selected> {{$item->name}}</option>
        @else
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endif
    @endforeach
    </select>


    <label class="mt-3">Cor</label>
    <select name="color" class="form-control">
        <option selected disabled></option>

    @foreach ($color as $item)
        @if($item->id == $carro->colors_id)
        <option value="{{$item->id}}" selected> {{$item->name}}</option>
        @else
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endif
    @endforeach
    </select>


    <label class="mt-3">Estado</label>
    <select name="estado" class="form-control">
        <option selected disabled></option>

    @foreach ($estado as $item)
        @if($item->id == $carro->estados_id)
        <option value="{{$item->id}}" selected> {{$item->name}}</option>
        @else
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endif
    @endforeach
    </select>






<input type="submit" value="Alterar" class="btn btn-success mt-1">
</form>

@endsection
