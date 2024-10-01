@extends('templates.main')

@section('content')

<form action="{{route('carro.store')}}" method="POST">
    @csrf
    <label class="mt-3">Placa</label>
    <input type="text" value="{{ old('placa') }}" name="placa" class="form-control {{$errors->has('placa') ? 'is-invalid': ''}}"/>
    @if ($errors->has('placa'))
        <div class="invalid-feedback">
            {{$errors->first('placa')}}
        </div>
    @endif

    <label class="mt-3">Modelo</label>
    <select name="modelo" class="form-control {{$errors->has('modelo') ? 'is-invalid': ''}}">
        <option selected disabled></option>
        @foreach ($modelos as $item)
            <option value="{{$item->id}}" {{ old('modelo') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('modelo'))
        <div class="invalid-feedback">
            {{$errors->first('modelo')}}
        </div>
    @endif

    <label class="mt-3">Cor</label>
    <select name="color" class="form-control {{$errors->has('color') ? 'is-invalid': ''}}">
        <option selected disabled></option>
        @foreach ($colors as $item)
            <option value="{{$item->id}}" {{ old('color') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('color'))
        <div class="invalid-feedback">
            {{$errors->first('color')}}
        </div>
    @endif


    <label class="mt-3">Estado</label>
    <select name="estado" class="form-control {{$errors->has('estado') ? 'is-invalid': ''}}">
        <option selected disabled></option>
        @foreach ($estados as $item)
            <option value="{{$item->id}}" {{ old('estado') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
        @endforeach
    </select>

    @if ($errors->has('estado'))
        <div class="invalid-feedback">
            {{$errors->first('estado')}}
        </div>
    @endif

    <input type="submit" value="Salvar" class="btn btn-success mt-1">

</form>

@endsection
