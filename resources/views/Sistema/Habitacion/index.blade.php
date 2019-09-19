@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Habitacion<a href="habitacion/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('sistema.Habitacion.search')
    </div>
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre de Habitacion</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($Habitaciones as $hab)
                    <tr>
                        <td>{{ $hab->id_habitacion}}</td>
                        <td>{{ $hab->nombre_n_habitacion}}</td>
                        <td>{{ $hab->tipohabitacion}}</td>
                        <td>{{ $hab->estado}}</td>
                        <td>
                        <a href="{{URL::action('HabitController@edit',$hab->id_habitacion)}}"><button class="btn btn-info">Editar</button></a>
                        {{-- <a href="" data-target="#modal-delete-{{$hab->id_habitacion}}" data-toggle="modal"><button class="btn btn-danger">Estado</button></a> --}}
                        </td>
                    </tr>
                    {{-- @include('Sistema.Habitacion.modal') --}}
                @endforeach
           </table> 
        </div>
        {{$Habitaciones->render()}}
    </div>
</div>







@endsection