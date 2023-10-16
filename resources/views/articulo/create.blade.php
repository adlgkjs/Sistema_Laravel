@extends('adminlte::page')

@section('title', 'Crear Articulo')

@section('content_header')
    <h1>Crear Registro</h1>
@stop

@section('content')
    <!--Hacemos un formulario para crear el nuevo registro-->
<!--/arcitulos hace referencia a la variable articulos del archivo ArticuloController?-->
<form action="/articulos" method="POST">
    <!--en laravel todas las directivas llevan el @ primero-->
    <!--para evitar el error 419 del servidor que puede ser una vulneravilidad-->
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" class="form-control" step="any" value="0.00" tabindex="4">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop