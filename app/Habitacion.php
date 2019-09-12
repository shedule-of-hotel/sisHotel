<?php

namespace AguaymantoHotel;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    //
    protected $table = 'habitacion';

    protected $primaryKey = 'id_habitacion';

    public $timestamps = false;

    protected $fillable = [
        'nombre_n_habitacion',
        'id_tipodehabitacion',
        'estado',
    ];

    protected $guarded = [];
}
