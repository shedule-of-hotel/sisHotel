@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Nueva Compra</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $caputra_error)
                    <li>{{$caputra_error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            {!!Form::open(array('url'=>'/compras','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_proveedor"> Cod Proveedor</label>
                <input type="number" step="any" min="1" name="id_proveedor" class="form-control" placeholder="Cod de Proveedor ...">
            </div>

            <div class="form-group">
                <label for="id_usuario"> Cod Usuario</label>
                <input type="number" step="any" min="1" name="id_usuario" class="form-control" placeholder="Cod de Usuario ...">
            </div>

            <div class="form-group">
                <label for="tipo_de_comprobante"> Tipo de Comprobante</label>
                <input type="text" name="tipo_de_comprobante" class="form-control" placeholder="Tipo de Comprobante ...">
            </div>
            
            <div class="form-group">
                <label for="serie"> Serie de Comprobante</label>
                <input type="text" name="serie" class="form-control" placeholder="Serie de Comprobante ...">
            </div>

            <div class="form-group">
                <label for="estado"> Estado de Comprobante</label>
                <input type="text" name="estado" class="form-control" placeholder="Estado de Comprobante ...">
            </div>

            <div class="form-group">   
                <label for="fecha"> Fecha</label>
                <input type="date" name="fecha" class="form-control" >
            </div>

            <div class="form-group">
                <label for="sub_total"> Sub Total</label>
                <input type="number" step="any" min="0" name="sub_total" class="form-control" placeholder=" ... ">
            </div>

            <div class="form-group">
                <label for="impuesto"> Impuestos</label>
                <input type="number" step="any" min="0" name="impuesto" class="form-control" placeholder=" ... ">
            </div>

            <div class="form-group">
                <label for="valor_total"> Total</label>
                <input type="number" step="any" min="0" name="valor_total" class="form-control" placeholder=" ... ">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}


        </div>
    </div>
@endsection
