@extends('adminlte::page')
@section('title', 'Alquileres Guaranda')

@section('content_header')
    <h1>Alquileres Guaranda</h1>
    <p>Crear nuevo rol</p>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.roles.store']) !!}
           @include('admin.roles.partials.form')
           {!! Form::submit('Crear rol', ['class'=>'btn btn-primary mt-2']) !!}
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