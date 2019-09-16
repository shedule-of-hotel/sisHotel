<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;// importamos el request
use AguaymantoHotel\Reserva; //usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf; //hacemos referencia a Redirecf para hacer algunas redirecciones   
use AguaymantoHotel\Http\Requests\ReservaFormRequest; //hacemos referencia a FormulariodeREquerimientos
use DB; //usar la base de datos

class ReservaController extends Controller
{
    public function __construct() //creamos el constructor
    { 
        $this->middleware('auth');
    }
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
        $reserva->id_habitacion = $request->get('id_habitacion');
        $reserva->id_cliente = $request->get('id_cliente');
        $reserva->id_empleado = $request->get('id_empleado');
        $reserva->fecha_de_reserva = $request->get('fecha_de_reserva');
        $reserva->fecha_de_ingreso = $request->get('fecha_de_ingreso');
        $reserva->fecha_de_salida = $request->get('fecha_de_salida');
        $reserva->costo_total = $request->get('costo_total');
        $reserva->estado_de_reserva = $request->get('estado_de_reserva');
        $reserva->notas_de_reserva = $request->get('notas_de_reserva');
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
        $reserva->estado_de_reserva = 'Cancelado';
        $reserva->update();
        return Redirect('reserva');
    }
}
