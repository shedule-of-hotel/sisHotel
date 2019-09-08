<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;
use AguaymantoHotel\http\Requests;
use AguaymantoHotel\Tipohabitacion;
use Illuminate\Support\Facades\Redirect;
use AguaymantoHotel\http\Requests\TipohabFormRequest;
use DB;

class TipohabController extends Controller
{
    //
    public function __construct()
    { }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $tiposhabitacion = DB::table('tipodehabitacion')->Where('nombredeltipo', 'LIKE', '%' . $query . '%')
                ->orderBy('id_tipodehabitacion', 'desc')
                ->paginate(10);
            return view('Sistema.tipohabitacion.index', ["tiposhabitacion" => $tiposhabitacion, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view("Sistema.tipohabitacion.create");
    }
    public function store(TipohabFormRequest $request)
    {
        $tipohabit = new Tipohabitacion();
        $tipohabit->nombredeltipo = $request->get('nombredeltipo');
        $tipohabit->descripcion_caracteristicas = $request->get('descripcion_caracteristicas');
        $tipohabit->precio_habitacion = $request->get('precio_habitacion');
        $tipohabit->save();
        return Redirect::to('Sistema/tipohabitacion');
    }
    public function show($id_tipodehabitacion)
    {
        return view("Sistema/tipohabitacion.show", ["tipohabitacion" => Tipohabitacion::findOrFail($id_tipodehabitacion)]);
    }
    public function edit($id_tipodehabitacion)
    {
        return view("Sistema/tipohabitacion.show", ["tipohabitacion" => Tipohabitacion::findOrFail($id_tipodehabitacion)]);
    }
    public function update(TipohabFormRequest $request, $id_tipodehabitacion)
    {
        $tipohabit = Tipohabitacion::findOrFail($id_tipodehabitacion);
        $tipohabit->nombredeltipo = $request->get('nombredeltipo');
        $tipohabit->descripcion_caracteristicas = $request->get('descripcion_caracteristicas');
        $tipohabit->precio_habitacion = $request->get('precio_habitacion');
        $tipohabit->update();
        return Redirect::to('Sistema/tipohabitacion');
    }
    public function destroy()
    { }
}
