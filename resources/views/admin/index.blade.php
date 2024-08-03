@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Listado de Administradores</h1>
@stop

@section('content')
    <p>Listado</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
