@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Editar habitacion : {{$habitacion->nombredeltipo}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $caputra_error)
                    <li>{{$caputra_error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            {!!Form::model($habitacion,['method'=>'PATCH','route'=>['habitacion.update',$habitacion->id_habitacion]])!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombre_n_habitacion">Nombre de habitacion</label>
                <input type="text" name="nombre_n_habitacion" class="form-control" value="{{$habitacion->nombre_n_habitacion}}" placeholder="Nombre del tipo ...">
            </div>

            <div class="form-group">
                <label for="id_tipodehabitacion">Tipo</label>
                <input type="text" name="id_tipodehabitacion" class="form-control" value="{{$habitacion->tipohabitacion}}" placeholder="Tipo ...">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" name="estado" class="form-control" placeholder="Estado">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}


        </div>
    </div>
@endsection 