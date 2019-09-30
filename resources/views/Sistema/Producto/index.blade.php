@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Productos<a href="producto/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('sistema.producto.search')
    </div>
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Cod</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Stock</th>
                    <th>Precio de Venta</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($productos as $pro)
                    <tr>
                        <td>{{ $pro->id_producto}}</td>
                        <td>{{ $pro->nombre_producto}}</td>
                        <td>{{ $pro->descripcion}}</td>
                        <td>{{ $pro->stock}}</td>
                        <td>{{ $pro->precio_venta}}</td>
                        <td>
                            <img src="{{asset('imagenes/productos/'.$pro->imagen)}}" alt="{{ $pro->nombre_producto}}" height="100" width="100" class="img-thumbnail">
                        </td>                            
                        <td >
                        <a href="{{URL::action('ProductoController@edit',$pro->id_producto)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$pro->id_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Sistema.Producto.modal')
                @endforeach
           </table> 
        </div>
        {{$productos->render()}}
    </div>
</div>







@endsection