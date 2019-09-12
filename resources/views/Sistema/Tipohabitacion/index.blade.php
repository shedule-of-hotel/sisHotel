@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Tipos de habitacion<a href="tipohabitacion/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('sistema.Tipohabitacion.search')
    </div>
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre del tipo</th>
                    <th>Descripcion caracteristicas</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($Tipos as $tip)
                    <tr>
                        <td>{{ $tip->id_tipodehabitacion}}</td>
                        <td>{{ $tip->nombredeltipo}}</td>
                        <td>{{ $tip->descripcion_caracteristicas}}</td>
                        <td>{{ $tip->precio_habitacion}}</td>
                        <td>
                        <a href="{{URL::action('TipohabController@edit',$tip->id_tipodehabitacion)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$tip->id_tipodehabitacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Sistema.Tipohabitacion.modal')
                @endforeach
           </table> 
        </div>
        {{$Tipos->render()}}
    </div>
</div>







@endsection