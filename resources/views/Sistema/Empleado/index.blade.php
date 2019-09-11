@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Empleado <a href="empleado/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('sistema.empleado.search')
    </div>
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Cod</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>N° de Documento</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($humano as $hum)
                    <tr>
                        <td>{{ $hum->id_humano}}</td>
                        <td>{{ $hum->nombres}}</td>
                        <td>{{ $hum->apellidos}}</td>
                        <td>{{ $hum->tipode_documento}}</td>
                        <td>{{ $hum->n_documento}}</td>
                        <td>{{ $hum->telefono}}</td>
                        <td>{{ $hum->direccion}}</td>
                        <td>{{ $hum->email}}</td>
                        <td>
                        <a href="{{URL::action('EmpleadoController@edit',$hum->id_humano)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$hum->id_humano}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Sistema.Empleado.modal')
                @endforeach
           </table> 
        </div>
        {{$humano->render()}}
    </div>
</div>







@endsection