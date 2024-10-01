@extends('templates.main')

@section('content')

<form action="{{route('carro.store')}}"method="POST">
    @csrf
    <label class="mt-3">placa</label>
    <input type="text" value="{{old('placa')}}" name="placa"  class="form-control {{$errors->has('placa') ? 'is-invalid': ""}}"/>
   @if ($errors->has('placa'))
      <div class="invalid-feedback">
         {{$errors->first('placa')}}
      </div>
   @endif

    <label class="mt-3">modelo</label>
    <select name="modelo">
        <option selected disabled></option>
        @foreach ($modelos as $item)
           <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
       </select>

       <label class="mt-3">cor</label>
    <select name="color">
        <option selected disabled></option>
        @foreach ($colors as $item)
           <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
       </select>

       <label class="mt-3">estado</label>
    <select name="estado">
        <option selected disabled></option>
        @foreach ($estados as $item)
           <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
       </select>

    <input type="submit" value="Salvar" class="btn btn-success mt-1">

</form>

@endsection
