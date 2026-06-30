@extends('adminlte::page')

@section('title', 'Dashboard-TuActivo')



@section('content_header')
    <h1 class="dashboard-title">Dashboard</h1>
@stop

@section('content')
    <div class="dashboard-hero">
        <div class="dashboard-hero-content">
            <h2 class="dashboard-subtitle">Bienvenido a la pagina de inicio de tu Sistema de Gestion de Activos.</h2>
        </div>
    </div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

