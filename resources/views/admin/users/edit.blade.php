@extends('adminlte::page')
@section('title', 'Alquileres Guaranda')

@section('content_header')
    <h1>Alquileres Guaranda</h1>
    <p>Asiganar un rol</p>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="h5">Nombre</h1>
        <p class="form-control">{{$user->name}}</p>

        <h1 class="h5">Lista de roles</h1>

        {!! Form::model($user, ['route'=>['admin.users.update', $user],'method'=>'put']) !!}

        @foreach ($roles as $rol)
        <div>
            <label> 
                {!! Form::checkbox('roles', $rol->id, null, ['class'=>'mr-1']) !!}
                {{$rol->name}}
            </label>
        </div>
            @endforeach

            {!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
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