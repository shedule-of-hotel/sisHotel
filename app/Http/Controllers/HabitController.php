<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;

class HabitController extends Controller
{
    //
    public function __constructor()
    { }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Tipos = DB::table('habitacion')->where('nombredeltipo', 'LIKE', '%' . $query . '%')
                ->orderBy('id_habitacion', 'asc')
                ->paginate(10);
            return view('Sistema.Habitacion.index', ["Tipos" => $Tipos, "searchText" => $query]);
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
