@extends('adminlte::page')
@section('title', 'Alquileres Guaranda')

@section('content_header')

    <h1>Editar Roles</h1>
@stop

@section('content')
@if (session('info'))

<div class="alert alert-primary" role="alert">
    <strong>Muy bien!</strong>{{session('info')}}
</div>
@endif
    <p>Edita el rol </p>

    <div class="card">
        <div class="card-body">
            {!! Form::model($role,['route'=>['admin.roles.update',$role],'method'=>'put']) !!}
               @include('admin.roles.partials.form')
               {!! Form::submit('editar rol', ['class'=>'btn btn-primary mt-2']) !!}
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