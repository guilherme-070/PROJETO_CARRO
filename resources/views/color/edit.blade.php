@extends('templates.main')

@section('content')

<form action="{{route('color.update', $color->id)}}"method="POST">
    @csrf
    @method('PUT')
    <label class="mt-3">Nome</label>
    <input type="text" name="name" class="form-control" class="form-control" value="{{$color->name}}"/>
</textarea>
<input type="submit" value="Alterar" class="btn btn-success mt-1">
</form>

@endsection
