<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;

use AguaymantoHotel\Http\Requests; // esto no se creo automaitcamente
use AguaymantoHotel\Compra; //usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf; //hacemos referencia a Redirecf para hacer algunas redirecciones   
use Illuminate\Support\facades\Input; //hacemos referencia a Input para subir imagenes
use AguaymantoHotel\Http\Requests\CompraFormRequest; //hacemos referencia a FormulariodeREquerimientos
use DB; //usar la base de datos

class CompraController extends Controller
{
    public function __construct() //creamos el constructor
    { 
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $compras = DB::table('compra')->where('serie', 'LIKE', '%' . $query . '%')
               // ->where('eliminado', '=', '1')
                ->orderBy('id_compra', 'desc')
                ->paginate(10);
            return view('Sistema.Compra.index', ["compras" => $compras, "searchText" => $query]);
        }
    }
    public function create() //Funcion para Crear en BD
    {
        return view('Sistema.Compra.create');
    }
    public function store(CompraFormRequest $request) //funcion para almacenar en BD
    {
        $compra = new Compra;
        $compra->id_proveedor = $request->get('id_proveedor');
        $compra->id_usuario = $request->get('id_usuario');
        $compra->tipo_de_comprobante = get('tipo_de_comprobante');
        $compra->serie = get('serie');
        $compra->estado = get('estado');
        $compra->fecha = get('fecha');
        $compra->sub_total = get('sub_total');
        $compra->impuesto = get('impuesto');
        $compra->valor_total = get('valor_total');
        $compra->save();
        return Redirect('compras');
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
