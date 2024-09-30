@extends('templates.main')

@section('content')

<form action="{{route('carro.store')}}"method="POST">
    @csrf
    <label class="mt-3">Placa</label>
    <input type="text" name="placa" class="form-control" value="{{$carro->placa}}" disabled/>
    <label class="mt-3">Modelo</label>
    <input type="text" name="modelo" class="form-control" value="{{$carro->modelos->name}}" disabled/>
    <label class="mt-3">Cor</label>
    <input type="text" name="color" class="form-control" value="{{$carro->colors->name}}" disabled/>
    <label class="mt-3">Estado</label>
    <input type="text" name="estado" class="form-control" value="{{$carro->estados->sigla}}" disabled/>



<a href="{{route('carro.index')}}" class="btn btn-secundary mt-2">
<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="gray" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
</svg>


</a>
</form>

@endsection
