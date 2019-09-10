<?php

namespace AguaymantoHotel;

use Illuminate\Database\Eloquent\Model;

class Tipohabitacion extends Model
{
    //
    protected $table = 'tipodehabitacion';

    protected $primaryKey = 'id_tipodehabitacion';

    public $timestamps = false;

    protected $fillable = [
        'nombredeltipo',
        'descripcion_caracteristicas',
        'precio_habitacion',
    ];

    protected $guarded = [];
}
