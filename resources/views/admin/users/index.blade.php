@extends('adminlte::page')
@section('title', 'Alquileres Guaranda')

@section('content_header')
    <h1>Alquileres Guaranda</h1>
    <p>Lista de usuario</p>
@stop

@section('content')

    @livewire('admin-users')
   
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