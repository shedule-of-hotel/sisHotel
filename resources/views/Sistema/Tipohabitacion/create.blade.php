@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Nuevo Tipo de habitacion</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $caputra_error)
                    <li>{{$caputra_error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            {!!Form::open(array('url'=>'/tipohabitacion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombredeltipo">Nombre del tipo</label>
                <input type="text" name="nombredeltipo" class="form-control" placeholder="Nombre del tipo ...">
            </div>

            <div class="form-group">
                <label for="descripcion_caracteristicas">Descripcion del tipo</label>
                <input type="text" name="descripcion_caracteristicas" class="form-control" placeholder="Descripcion del tipo ...">
            </div>

            <div class="form-group">
                <label for="precio_habitacion">Precio de habitacion</label>
                <input type="number" step="any" min="0" name="precio_habitacion" class="form-control" placeholder="Precio de habitacion ...">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}


        </div>
    </div>
@endsection
