@extends('adminlte::page')
@section('title', 'Alquileres Guaranda')

@section('content_header')
    <h1>Alquileres Guaranda</h1>
    <p>Indice de roles</p>
@stop

@section('content')
@if (session('info'))

<div class="alert alert-primary" role="alert">
    <strong>Muy bien!</strong>{{session('info')}}
</div>
@endif

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}">Crear roles</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('admin.roles.edit', $item )}}">Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.roles.destroy',$item)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"> No hay roles</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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