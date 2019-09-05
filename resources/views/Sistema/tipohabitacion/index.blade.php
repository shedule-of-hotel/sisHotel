@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Tipos de habitaciones <a href=""><button class="btn btn-info">Nuevo</button></a></h3>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-border table-condensed table-hover">
            <thead>
                <th></th>
                <th>Id</th>
                <th>Tipo de habitacion</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Opciones</th>
            </thead>
            @foreach ($tiposhabitacion as $tipo)
                <td>{{$tipo->id_tipodehabitacion}}</td>
                <td>{{$tipo->nombredeltipo}}</td>
                <td>{{$tipo->descripcion_caracteristicas}}</td>
                <td>{{$tipo->precio_habitacion}}</td>
                <td>
                    <a href="#"><button class="btn btn-warning">Editar</button></a>|
                    <a href="#"><button class="btn btn-danger">Eliminar</button></a>
                </td>
            @endforeach
        </table>
    </div>
    {{$tiposhabitacion->render()}}
</div>
@endsection