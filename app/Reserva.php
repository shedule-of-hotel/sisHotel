<?php

namespace AguaymantoHotel;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //indicamos referencia a la tabla::::::
    protected $table = 'reserva';
    //indicamos las conexiones principales de la base de datos
    protected $primaryKey = 'id_reserva';


    //para que laravel integre columnas de creaccion  y actualizacion automaticamente
    public $timestamps=false;


    //campos que van a recibir un valor y almacenarlo  en el modelo
    protected $fillable =[
        'id_habitacion',
        'id_cliente',
        'id_empleado',
        'fecha_de_reserva',
        'fecha_de_ingreso',
        'fecha_de_salida',
        'costo_total',
        'estado_de_reserva',
        'notas_de_reserva',
    ];

    // los campos guarder se especifican cuando no deseas que se agreguen al modelo
    protected $guarded =[

    ];



    
}
