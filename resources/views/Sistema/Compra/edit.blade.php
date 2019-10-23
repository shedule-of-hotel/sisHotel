@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Editar Compra : {{ $compra->nombre_compra}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $caputra_error)
                    <li>{{$caputra_error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
    </div>

            {!!Form::model($compra,['method'=>'PATCH','route'=>['compra.update',$compra->id_compra],'enctype'=>'multipart/form-data'])!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre_compra">Nombre del compra</label>
                    <input type="text" name="nombre_compra" class="form-control" value="{{$compra->nombre_compra}}" placeholder="Nombre del compra ...">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion del compra</label>
                    <input type="text" name="descripcion" class="form-control" value="{{$compra->descripcion}}" placeholder="Descripcion del compra ...">
                </div>

                <div class="form-group">   
                    <label for="stock">Stock del compra</label>
                    <input type="number" step="any" min="0" name="stock" class="form-control" value="{{$compra->stock}}" placeholder="Stock del compra ...">
                </div>

                <div class="form-group">
                    <label for="precio_venta">Precio de Venta del compra</label>
                    <input type="number" step="any" min="0" name="precio_venta" class="form-control" value="{{$compra->precio_venta}}" placeholder="Precio de Venta ...">
                </div>

                <div class="form-group">
                    <label for="precio_venta">Imagen</label>
                    <input type="file" name="imagen" accept="image/*" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                @if(($compra->imagen)!="")
                    <img src="{{asset('imagenes/compras/'.$compra->imagen)}}"height="300" width="470">
                @endif
            </div>

            {!!Form::close()!!}

@endsection
