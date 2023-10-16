@extends('adminlte::page')

@section('title', 'Editar Articulo')

@section('content_header')
    <h1>Editar Articulo</h1>
@stop

@section('content')
    <!--Usamos el mismo formulario de crear para editar un registro-->
<!--/arcitulos hace referencia a la variable articulos del archivo ArticuloController?-->
<!--especificamos el id para que el formulario sepa de que articulo estamos hablando-->
<form action="/articulos/{{$articulo->id}}" method="POST">
    <!--en laravel todas las directivas llevan el @ primero-->
    <!--para evitar el error 419 del servidor que puede ser una vulneravilidad-->
    @csrf
    <!--al editar un dato el motodo correcto para envairlo es PUT no POST para eso las siguiente linea-->
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input id="codigo" name="codigo" type="text" value="{{$articulo->codigo}}" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" value="{{$articulo->descripcion}}" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" value="{{$articulo->cantidad}}" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" value="{{$articulo->precio}}" class="form-control" step="any" tabindex="4">
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