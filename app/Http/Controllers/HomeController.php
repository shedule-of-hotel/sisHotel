<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;
use AguaymantoHotel\Http\Requests;
use AguaymantoHotel\Habitacion;
use Illuminate\Support\facades\redirecf;
use AguaymantoHotel\Http\Requests\HabitFormRequest;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Habitaciones = DB::table('habitacion as h')
            ->join('tipodehabitacion as t', 'h.id_tipodehabitacion', '=', 't.id_tipodehabitacion')
            ->select('h.id_habitacion', 'h.nombre_n_habitacion', 't.nombredeltipo as tipohabitacion', 'h.estado')
            ->orderBy('id_habitacion', 'asc');

        $Habitaciones = $Habitaciones->get();
        return view('layouts.index', ["Habitaciones" => $Habitaciones]);
    }    
}
