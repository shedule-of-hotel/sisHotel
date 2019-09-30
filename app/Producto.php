<?php

namespace AguaymantoHotel;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //indicamos referencia a la tabla::::::
    protected $table = 'producto';
    //indicamos las conexiones principales de la base de datos
    protected $primaryKey = 'id_producto';


    //para que laravel integre columnas de creaccion  y actualizacion automaticamente
    public $timestamps=false;


    //campos que van a recibir un valor y almacenarlo  en el modelo
    protected $fillable =[
        'nombre_producto',
        'descripcion',
        'stock',
        'precio_venta',
        'imagen',
    ];

    // los campos guarder se especifican cuando no deseas que se agreguen al modelo
    protected $guarded =[

    ];



    
}
