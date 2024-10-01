@extends('templates.main')

@section('content')

<form action="{{ route('modelo.store') }}" method="POST">
    @csrf
    <label class="mt-3">Nome</label>
    <input type="text" value="{{ old('name') }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"/>
    @if ($errors->has('name'))
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif

    <label class="mt-3">Marca</label>
    <select name="marca" class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}" required>
        <option selected disabled>Selecione uma marca</option>
        @foreach ($marcas as $item)
            <option value="{{ $item->id }}" {{ old('marca') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('marca'))
        <div class="invalid-feedback">
            {{ $errors->first('marca') }}
        </div>
    @endif

    <input type="submit" value="Salvar" class="btn btn-success mt-1">

</form>

@endsection
