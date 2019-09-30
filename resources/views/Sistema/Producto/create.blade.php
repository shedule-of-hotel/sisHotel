@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Nuevo Producto</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $caputra_error)
                    <li>{{$caputra_error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            {!!Form::open(array('url'=>'/producto','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto</label>
                <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre del Producto ...">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion del Producto</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion del Producto ...">
            </div>

            <div class="form-group">   
                <label for="stock">Stock del Producto</label>
                <input type="number" step="any" min="0" name="stock" class="form-control" placeholder="Stock del Producto ...">
            </div>

            <div class="form-group">
                <label for="precio_venta">Precio de Venta del Producto</label>
                <input type="number" step="any" min="0" name="precio_venta" class="form-control" placeholder="Precio de Venta ...">
            </div>

            <div class="form-group">
                <label for="precio_venta">Imagen</label>
                <input type="file" name="imagen" accept="image/*" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}


        </div>
    </div>
@endsection
