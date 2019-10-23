<?php

namespace AguaymantoHotel;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //indicamos referencia a la tabla::::::
    protected $table = 'compra';
    //indicamos las conexiones principales de la base de datos
    protected $primaryKey = 'id_compra';


    //para que laravel integre columnas de creaccion  y actualizacion automaticamente
    public $timestamps=false;


    //campos que van a recibir un valor y almacenarlo  en el modelo
    protected $fillable =[
        'id_compra',
        'id_proveedor',
        'id_usuario',
        'tipo_de_comprobante',
        'serie',
        'estado',
        'fecha',
        'sub_total',
        'impuesto',
        'valor_total',
    ];

    // los campos guarder se especifican cuando no deseas que se agreguen al modelo
    protected $guarded =[

    ];



    
}
