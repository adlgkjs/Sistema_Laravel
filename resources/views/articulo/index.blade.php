@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>Listado de Articulos</h1>
@stop

@section('content')
    <!--"articulos/create"hace rerencia al archivo dentro de la carpeta articulos,
dentro ira el codigo para crear un nuevo articulo-->
<a href="articulos/create" class="btn btn-primary mb-2">CREAR</a>

<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <!--thead es para los titulos de la tabla-->
    <thead class="bg-primary text-white">
        <!--tr hace referencia a una fila de la tabla-->
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cógido</th>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <!--tbody es para el cuerpo de la tabla, todas las demas filas-->
    <tbody>
        <!--recibimos los registros almacenados en la variable $ariticulos en el archivo ArticuloController,
        se reciben en plural pero se muestran en sigular-->        
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->codigo}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>{{$articulo->cantidad}}</td>
            <td>{{$articulo->precio}}</td>
            <td>
        <!--el articulos.destroy hace referencia al ArticuloController-->
                <form action="{{route('articulos.destroy', $articulo->id)}}" method="POST">
                    <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-success">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!--aqui adentro se referencian los archivos css de datatables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <!--referenciamos los scripts de datatables-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!--script para inicializar datatables-->
    <script>
    //esto es para crear la nueva tabla llamada "articulos"
        new DataTable('#articulos', {
            //esto es para determinar la paginacion de la tabla (cuantos registros por vista mostrara)
            "lengthMenu": [[5,10,15,20,25,30,-1], [5,10,15,20,25,30, "All"]]
        });
    </script>
@stop