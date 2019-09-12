@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Nuevo Reserva</h3>
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
            {!!Form::open(array('url'=>'/reserva','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">   
                    <label for="id_habitacion">Cod Habitacion</label>
                    <input type="number" step="any" min="0" name="id_habitacion" class="form-control" placeholder="Codigo de la Habitación...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="id_cliente">Cod Cliente</label>
                    <input type="number" step="any" min="0" name="id_cliente" class="form-control" placeholder="Precio de Venta ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="id_empleado">Cod Empleado</label>
                    <input type="number" step="any" min="0" name="id_empleado" class="form-control" placeholder="Precio de Venta ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_de_reserva">Fecha de Reserva</label>
                    <input type="date" name="fecha_de_reserva" class="form-control" min="" >
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_de_ingreso">Fecha de Ingreso ... esto tiene que ser automatico ... que hace aca</label>
                    <input type="date" name="fecha_de_ingreso" class="form-control" placeholder="Descripcion del reserva ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_de_salida">Fecha de Salida</label>
                    <input type="date" name="fecha_de_salida" class="form-control" placeholder="Descripcion del reserva ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="costo_total">Costo Total</label>
                    <input type="number" step="any" min="0" name="costo_total" class="form-control" placeholder="Precio de Venta ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                        <label for="estado_de_reserva">Estado de Reserva</label>
                        <select name="estado_de_reserva" class="form-control">
                            <option value="Activo">Activo</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="Pagado">Pagado</option>
                        </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="notas_de_reserva">Notas de Reserva</label>
                    <input type="text" name="notas_de_reserva" class="form-control" placeholder="Descripcion del reserva ...">
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
