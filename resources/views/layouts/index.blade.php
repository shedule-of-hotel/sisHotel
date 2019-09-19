@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Control de Habitaciones</h3>
    </div>
</div> 

<div class="row">


        @foreach ($Habitaciones as $hab)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">{{$hab->nombre_n_habitacion}}</span>
              <span class="info-box-text">{{$hab->tipohabitacion}}</span>
              <span class="info-box-number">{{$hab->estado}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endforeach
</div>







@endsection