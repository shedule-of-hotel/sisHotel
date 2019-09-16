<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;
use AguaymantoHotel\Humano; //usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf; //hacemos referencia a Redirecf para hacer algunas redirecciones     
use AguaymantoHotel\Http\Requests\HumanoFormRequest; //hacemos referencia a FormulariodeREquerimientos
use DB; //usar la base de datos

class EmpleadoController extends Controller
{
    public function __construct() //creamos el constructor
    { 
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $humano = DB::table('humano')
                ->where('nombres', 'LIKE', '%' . $query . '%')
                ->where('tipo_de_humano', '=', 'Empleado')
                ->orwhere('n_documento', 'LIKE', '%' . $query . '%')
                ->where('tipo_de_humano', '=', 'Empleado')
                ->orderBy('id_humano', 'desc')
                ->paginate(10);
            return view('Sistema.Empleado.index', ["humano" => $humano, "searchText" => $query]);
        }
    }
    public function create() //Funcion para Crear en BD
    {
        return view('Sistema.Empleado.create');
    }
    public function store(HumanoFormRequest $request) //funcion para almacenar en BD
    {
        $humano = new Humano;
        $humano->nombres = $request->get('nombres');
        $humano->apellidos = $request->get('apellidos');
        $humano->tipode_documento = $request->get('tipode_documento');
        $humano->n_documento = $request->get('n_documento');
        $humano->telefono = $request->get('telefono');
        $humano->direccion = $request->get('direccion');
        $humano->email = $request->get('email');
        $humano->tipo_de_humano = 'Empleado';
        $humano->save();
        return Redirect('empleado');
    }
    public function show($id) //funcion para mostrar
    {
        return view("Sistema.Empleado.show", ["humano" => Humano::findOrFail($id)]);
    }
    public function edit($id) //funcion para editar
    {
        return view("Sistema.Empleado.edit", ["humano" => Humano::findOrFail($id)]);
    }
    public function update(HumanoFormRequest $request, $id) // funcion para actualizar
    {
        $humano = Humano::findOrFail($id);
        $humano->update($request->all());
        return Redirect('empleado');
    }
    public function destroy($id) //para eliminar un objeto
    {
        $humano = Humano::findOrFail($id);
        $humano->tipo_de_humano = 'Inactivo';
        $humano->update();
        return Redirect('empleado');
    }
}
