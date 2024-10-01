@extends('templates.main')

@section('content')

<a href="{{route('carro.create')}}" class="btn btn primary mt - 3">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000" class="bi bi-plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg>
</a>




<table  class="table  table-striped">
    <thead  class="table table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">PLACA</th>
        <th scope="col">MODELO</th>
        <th scope="col">COR</th>
        <th scope="col">ESTADO</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($data as $item )

      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->placa}}</td>
        <td>{{$item->modelos->name}}</td>
        <td>{{$item->colors->name}}</td>
        <td>{{$item->estados->name}}</td>
        <td>

        <a href="{{route('carro.show', $item->id)}}" class="btn btn-info">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
        </svg>
    </a>



    <a href="{{route('carro.edit', $item->id)}}" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="White" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
        </svg>
    </a>

    <form action="{{route('carro.destroy', $item->id)}}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash3-fill" viewBox="0 0 16 16">
              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
          </svg>
        </button>

      </form>

        </td>



      </tr>

    @endforeach
    </tbody>
  </table>

@endsection
