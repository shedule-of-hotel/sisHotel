@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Control de Habitaciones</h3>
    </div>
</div> 

<div class="row">


        @foreach ($Habitaciones as $hab)
        <?php
            $classe="info-box-icon bg-aqua";
            $estado =$hab->estado;
            switch ($estado) {            
                case "Activo":
                    $classe="info-box-icon bg-aqua";
                    break;
                case "Ocupado":
                    $classe="info-box-icon bg-green";
                    break;
                case "Mantenimiento":
                    $classe="info-box-icon bg-yellow";
                    break;
                case "Inhabilitado":
                    $classe="info-box-icon bg-red";
                    break;
            }
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="{{$classe}}"><i class="fa fa-bed"></i></span>

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