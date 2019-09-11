@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Nuevo Empleado</h3>
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

            {!!Form::open(array('url'=>'/empleado','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombres">Nombres del empleado</label>
                    <input type="text" name="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombres del empleado ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="apellidos">Apellidos del empleado</label>
                    <input type="text" name="apellidos" required value="{{old('apellidos')}}" class="form-control" placeholder="Apellidos del empleado ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="tipode_documento">Tipo de Documento</label>
                    <select name="tipode_documento" class="form-control">
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS">PAS</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="n_documento">N° de Documento</label>
                    <input type="number" step="any" min="0" name="n_documento" required value="{{old('n_documento')}}" class="form-control" placeholder="N° de Documento ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="telefono">Telefono del empleado</label>
                    <input type="number" step="any" min="0" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Telefono del empleado ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">   
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>


            {!!Form::close()!!}



@endsection
