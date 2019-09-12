@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Reservas<a href="reserva/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('sistema.reserva.search')
    </div>
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Cod</th>
                    <th>Cod habitacion</th>
                    <th>Cod Cliente</th>
                    <th>Cod Empleado</th>
                    <th>Fecha de Reserva</th>
                    <th>Fecha de Ingreso</th>
                    <th>Fecha de Salida</th>
                    <th>Costo total</th>
                    <th>Estado de Reserva</th>
                    <th>Notas de Reserva</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($reservas as $res)
                    <tr>
                        <td>{{ $res->id_reserva}}</td>
                        <td>{{ $res->id_habitacion}}</td>
                        <td>{{ $res->id_cliente}}</td>
                        <td>{{ $res->id_empleado}}</td>
                        <td>{{ $res->fecha_de_reserva}}</td>
                        <td>{{ $res->fecha_de_ingreso}}</td>
                        <td>{{ $res->fecha_de_salida}}</td>
                        <td>{{ $res->costo_total}}</td>
                        <td>{{ $res->estado_de_reserva}}</td>
                        <td>{{ $res->notas_de_reserva}}</td>
                        <td>
                        <a href="{{URL::action('ReservaController@edit',$res->id_reserva)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$res->id_reserva}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Sistema.reserva.modal')
                @endforeach
           </table> 
        </div>
        {{$reservas->render()}}
    </div>
</div>







@endsection