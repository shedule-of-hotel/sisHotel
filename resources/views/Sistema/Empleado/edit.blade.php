@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Editar Empleado : {{ $humano->id_humano}}</h3>
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

            {!!Form::model($humano,['method'=>'PATCH','route'=>['empleado.update',$humano->id_humano]])!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombres">Nombres del Empleado</label>
                    <input type="text" name="nombres"  value="{{$humano->nombres}}" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="apellidos">Apellidos del Empleado</label>
                    <input type="text" name="apellidos" value="{{$humano->apellidos}}" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="tipode_documento">Tipo de Documento</label>
                    <select name="tipode_documento" class="form-control">
                    @if ($humano->tipode_documento=='DNI')
                        <option value="DNI" selected>DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS">PAS</option>
                    @elseif ($humano->tipode_documento=='RUC')
                        <option value="DNI">DNI</option>
                        <option value="RUC" selected>RUC</option>
                        <option value="PAS">PAS</option>
                    @else ($humano->tipode_documento=='PAS')
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS" selected>PAS</option>
                    @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="n_documento">N° de Documento</label>
                    <input type="number" step="any" min="0" name="n_documento" value="{{$humano->n_documento}}" class="form-control" placeholder="N° de Documento ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="telefono">Telefono del Empleado</label>
                    <input type="number" step="any" min="0" name="telefono" value="{{$humano->telefono}}" class="form-control" placeholder="Telefono del Empleado ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">   
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" value="{{$humano->direccion}}" class="form-control" placeholder="Direccion ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$humano->email}}" class="form-control" placeholder="Email ...">
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