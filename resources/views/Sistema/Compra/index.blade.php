@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Compras<a href="compras/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('sistema.Compra.search')
    </div>
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Cod Compra</th>
                    <th>Cod Proveedor</th>
                    <th>Cod Usuario</th>
                    <th>Tipo de Comprobante</th>
                    <th>Serie</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Sub Total</th>
                    <th>Impuestos</th>
                    <th>Total</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($compras as $com)
                    <tr>
                        <td>{{ $com->id_compra}}</td>
                        <td>{{ $com->id_proveedor}}</td>
                        <td>{{ $com->id_usuario}}</td>
                        <td>{{ $com->tipo_de_comprobante}}</td>
                        <td>{{ $com->serie}}</td>
                        <td>{{ $com->estado}}</td>
                        <td>{{ $com->fecha}}</td>
                        <td>{{ $com->sub_total}}</td>
                        <td>{{ $com->impuestos}}</td>
                        <td>{{ $com->total}}</td>                           
                        <td >
                        <a href="{{URL::action('CompraController@edit',$com->id_compra)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$com->id_compra}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Sistema.Compra.modal')
                @endforeach
           </table> 
        </div>
        {{$compras->render()}}
    </div>
</div>







@endsection