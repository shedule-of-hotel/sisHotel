<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;// importamos el request
use AguaymantoHotel\Reserva; //usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf; //hacemos referencia a Redirecf para hacer algunas redirecciones   
use AguaymantoHotel\Http\Requests\ReservaFormRequest; //hacemos referencia a FormulariodeREquerimientos
use DB; //usar la base de datos

class ReservaController extends Controller
{
    public function __constructor() //creamos el constructor
    { }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = DB::table('reserva')->where('id_reserva', 'LIKE', '%' . $query . '%')
                ->where('estado_de_reserva', '=', 'Activo')
                ->orderBy('id_reserva', 'desc')
                ->paginate(10);
            return view('Sistema.reserva.index', ["reservas" => $reservas, "searchText" => $query]);
        }
    }
    public function create() //Funcion para Crear en BD
    {
        return view('Sistema.reserva.create');
    }
    public function store(reservaFormRequest $request) //funcion para almacenar en BD
    {
        $reserva = new reserva;
        $reserva->nombre_reserva = $request->get('nombre_reserva');
        $reserva->descripcion = $request->get('descripcion');
        $reserva->stock = $request->get('stock');
        $reserva->precio_venta = $request->get('precio_venta');
        $reserva->save();
        return Redirect('reserva');
    }
    public function show($id) //funcion para mostrar
    {
        return view("Sistema.reserva.show", ["reserva" => reserva::findOrFail($id)]);
    }
    public function edit($id) //funcion para editar
    {
        return view("Sistema.reserva.edit", ["reserva" => reserva::findOrFail($id)]);
    }
    public function update(reservaFormRequest $request, $id) // funcion para actualizar
    {
        $produto = reserva::findOrFail($id);
        $produto->update($request->all());
        return Redirect('reserva');
    }
    public function destroy($id) //para eliminar un objeto
    {
        $reserva = reserva::findOrFail($id);
        $reserva->eliminado = '0';
        $reserva->update();
        return Redirect('reserva');
    }
}
