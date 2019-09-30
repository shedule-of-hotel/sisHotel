<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;

use AguaymantoHotel\Http\Requests; // esto no se creo automaitcamente
use AguaymantoHotel\Producto; //usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf; //hacemos referencia a Redirecf para hacer algunas redirecciones   
use Illuminate\Support\facades\Input; //hacemos referencia a Input para subir imagenes
use AguaymantoHotel\Http\Requests\ProductoFormRequest; //hacemos referencia a FormulariodeREquerimientos
use DB; //usar la base de datos


class ProductoController extends Controller
{
    public function __construct() //creamos el constructor
    { 
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $productos = DB::table('producto')->where('nombre_producto', 'LIKE', '%' . $query . '%')
                ->where('eliminado', '=', '1')
                ->orderBy('id_producto', 'desc')
                ->paginate(10);
            return view('Sistema.Producto.index', ["productos" => $productos, "searchText" => $query]);
        }
    }
    public function create() //Funcion para Crear en BD
    {
        return view('Sistema.Producto.create');
    }
    public function store(ProductoFormRequest $request) //funcion para almacenar en BD
    {
        $imagenName="";

        $producto = new Producto;
        $producto->nombre_producto = $request->get('nombre_producto');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = $request->get('stock');
        $producto->precio_venta = $request->get('precio_venta');

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $imagenName=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/productos/',$imagenName);
        }

        $producto->imagen = $imagenName;
        $producto->save();
        return Redirect('producto');
    }
    public function show($id) //funcion para mostrar
    {
        return view("Sistema.Producto.show", ["producto" => Producto::findOrFail($id)]);
    }
    public function edit($id) //funcion para editar
    {
        return view("Sistema.Producto.edit", ["producto" => Producto::findOrFail($id)]);
    }
    public function update(ProductoFormRequest $request, $id) // funcion para actualizar
    {
        $producto = Producto::findOrFail($id);
        $imagenName="";

        $producto->nombre_producto = $request->get('nombre_producto');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = $request->get('stock');
        $producto->precio_venta = $request->get('precio_venta');

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $imagenName=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/productos/',$imagenName);
        }

        $producto->imagen = $imagenName;
        $producto->save();
        return Redirect('producto'); 
    }
    public function destroy($id) //para eliminar un objeto
    {
        $producto = Producto::findOrFail($id);
        $producto->eliminado = '0';
        $producto->update();
        return Redirect('producto');
    }
}
