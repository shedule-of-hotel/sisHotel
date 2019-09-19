@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Nueva habitacion</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $caputra_error)
                    <li>{{$caputra_error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            {!!Form::open(array('url'=>'/habitacion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombre_n_habitacion">Nombre de habitacion</label>
                <input type="text" name="nombre_n_habitacion" class="form-control" placeholder="Nombre ">
            </div>

            <div class="form-group">
                <label for="id_tipodehabitacion">Tipo</label>
                <select name="id_tipodehabitacion" class="form-control">
                    @foreach ($nombredeltipo as $tipo)
                <option value="{{$tipo->id_tipodehabitacion}}">{{$tipo->nombredeltipo}}</option> 
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{-- <label for="estado">Estado</label> --}}
                <input type="hidden" name="estado" value="Activo" class="form-control" placeholder="Estado">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}


        </div>
    </div>
@endsection