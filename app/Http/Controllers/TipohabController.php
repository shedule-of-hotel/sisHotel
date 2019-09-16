<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;
use AguaymantoHotel\Http\Requests;
use AguaymantoHotel\Tipohabitacion;
use Illuminate\Support\facades\redirecf;
use AguaymantoHotel\Http\Requests\TipohabFormRequest;
use DB;

class TipohabController extends Controller
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
            $Tipos = DB::table('tipodehabitacion')->where('nombredeltipo', 'LIKE', '%' . $query . '%')
                ->where('eliminado', '=', '1')
                ->orderBy('id_tipodehabitacion', 'asc')
                ->paginate(10);
            return view('Sistema.Tipohabitacion.index', ["Tipos" => $Tipos, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view('Sistema.Tipohabitacion.create');
    }
    public function store(TipohabFormRequest $request)
    {
        $tipohabitacion = new Tipohabitacion();
        $tipohabitacion->nombredeltipo = $request->get('nombredeltipo');
        $tipohabitacion->descripcion_caracteristicas = $request->get('descripcion_caracteristicas');
        $tipohabitacion->precio_habitacion = $request->get('precio_habitacion');
        $tipohabitacion->save();
        return Redirect('tipohabitacion');
    }
    public function show($id)
    {
        return view("Sistema.Tipohabitacion.show", ["tipohabitacion" => Tipohabitacion::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("Sistema.Tipohabitacion.edit", ["tipohabitacion" => Tipohabitacion::findOrFail($id)]);
    }
    public function update(TipohabFormRequest $request, $id)
    {
        $tipohabitacion = Tipohabitacion::findOrFail($id);
        $tipohabitacion->update($request->all());
        return Redirect('tipohabitacion');
    }
    public function destroy($id) //para eliminar un objeto
    {
        $tipohabitacion = Tipohabitacion::findOrFail($id);
        $tipohabitacion->eliminado = '0';
        $tipohabitacion->update();
        return Redirect('tipohabitacion');
    }
}
