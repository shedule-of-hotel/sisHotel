<?php

namespace AguaymantoHotel;

use Illuminate\Database\Eloquent\Model;

class Humano extends Model
{
    //indicamos referencia a la tabla::::::
    protected $table = 'humano';
    //indicamos las conexiones principales de la base de datos
    protected $primaryKey = 'id_humano';


    //para que laravel integre columnas de creaccion  y actualizacion automaticamente
    public $timestamps=false;


    //campos que van a recibir un valor y almacenarlo  en el modelo
    protected $fillable =[
        'id_humano',
        'nombres',
        'apellidos',
        'tipode_documento',
        'n_documento',
        'telefono',
        'direccion',
        'email',
    ];

    // los campos guarder se especifican cuando no deseas que se agreguen al modelo
    protected $guarded =[

    ];



    
}
