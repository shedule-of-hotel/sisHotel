<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;
use AguaymantoHotel\Http\Requests;
use AguaymantoHotel\Habitacion;
use Illuminate\Support\facades\redirecf;
use AguaymantoHotel\Http\Requests\HabitFormRequest;
use DB;

class HabitController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Habitaciones = DB::table('habitacion as h')
                ->join('tipodehabitacion as t', 'h.id_tipodehabitacion', '=', 't.id_tipodehabitacion')
                ->select('h.id_habitacion', 'h.nombre_n_habitacion', 't.nombredeltipo as tipohabitacion', 'h.estado')
                ->where('h.nombre_n_habitacion', 'LIKE', '%' . $query . '%')
                ->orderBy('id_habitacion', 'asc')
                ->paginate(10);
            return view('Sistema.Habitacion.index', ["Habitaciones" => $Habitaciones, "searchText" => $query]);
        }
    }
    public function create()
    {
        $tipohabitacion = DB::table('tipodehabitacion')->get();
        return view('Sistema.Habitacion.create', ["nombredeltipo" => $tipohabitacion]);
    }
    public function store(HabitFormRequest $request)
    {
        $habitacion = new Habitacion();
        $habitacion->nombre_n_habitacion = $request->get('nombre_n_habitacion');
        $habitacion->id_tipodehabitacion = $request->get('id_tipodehabitacion');
        $habitacion->estado = $request->get('estado');
        $habitacion->save();
        return Redirect('habitacion');
    }
    public function show($id)
    {
        return view("Sistema.habitacion.show", ["habitacion" => Habitacion::findOrFail($id)]);
    }
    public function edit($id)
    {
        $tipohabitacion = DB::table('tipodehabitacion')->get();
        return view("Sistema.habitacion.edit", ["habitacion" => Habitacion::findOrFail($id)], ["nombredeltipo" => $tipohabitacion]);
    }
    public function update(HabitFormRequest $request, $id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update($request->all());
        return Redirect('habitacion');
    }
    public function destroy(HabitFormRequest $request, $id) //para eliminar un objeto
    {
        $habitacion = Habitacion::findOrFail($id);

        $habitacion->update($request->all());
        return Redirect('habitacion');
    }
}
