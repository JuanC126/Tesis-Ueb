@extends('adminlte::page')
@section('title', 'Alquileres Guaranda')

@section('content_header')
    <h1>Alquileres Guaranda</h1>
@stop

@section('content')
    <p>Bienvenido Adminstrador</p>

    <p>Todos los anuncios</p>
<div data-te-datatable-init>
    <table>
      <thead>
        <tr>
          <th>Anuncio Id</th>
          <th>Titulo</th>
          <th>Usuario</th>
          <th>Estado</th>
          <th>fecha publicado</th>
          <th>eliminar Anuncio</th>
        </tr>
      </thead>
      @foreach ($anuncios as $item)
      <tbody>
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->titulo}}</td>
          <td>{{$item->user_id}}</td>
        
          <td>@if($item->estado == 1)
          Publicado
        @elseif($item->estado == 2)
            No publicado
        @else
            Otro estado
        @endif</td>
          <td>{{$item->created_at}}</td>
        
        </td> 
        <td>
            <td>
                <form action="{{ route('eliminar-anuncio', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            
        </td>
        </tr>
        
      </tbody>
      @endforeach
    </table>
    
  </div>
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
       table {
        border-spacing: 0 10px; /* Ajusta el valor vertical según tus necesidades */
    }

    th, td {
        padding: 8px; /* Ajusta el valor según tus necesidades */
    }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop