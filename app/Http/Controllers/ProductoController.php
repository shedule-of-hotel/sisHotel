<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;

use AguaymantoHotel\Http\Requests; // esto no se creo automaitcamente
use AguaymantoHotel\Producto;//usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf;//hacemos referencia a Redirecf para hacer algunas redirecciones   
use AguaymantoHotel\Http\Requests\ProductoFormRequest;//hacemos referencia a FormulariodeREquerimientos
use DB;//usar la base de datos


class ProductoController extends Controller
{
    public function __constructor() //creamos el constructor
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $productos=DB::table('producto')->where('nombre_producto','LIKE','%'.$query.'%')
            ->orderBy ('id_producto','desc')
            ->paginate(7);
            return view('Sistema.Producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
    public function create()//Funcion para Crear en BD
    {
        return view('Sistema.Producto.create');
    }
    public function store(ProductoFormRequest $request)//funcion para almacenar en BD
    {
        $producto =new Producto;
        $producto->nombre_producto=$request->get('nombre_producto');
        $producto->descripcion=$request->get('descripcion');
        $producto->stock=$request->get('stock');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->save();
        return Redirect::to('Sistema/Producto');
    }
    public function show($id)//funcion para mostrar
    {
        return view("Sistema.Producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)//funcion para editar
    {
        return view("Sistema.Producto.edit",["producto"=>Producto::findOrFail($id)]);
    }
    public function update(ProductoFormRequest $request,$id)// funcion para actualizar
    {
        $producto=Producto::findOrFail($id);
        $producto->nombre_producto=$request->get(nombre_producto);
        $producto->descripcion=$request->get(descripcion);
        $producto->stock=$request->get(stock);
        $producto->precio_venta=$request->get(precio_venta);
        $producto->update();
        return Redirect::to('Sistema/Producto');

    }
    public function destroid($id)//para eliminar un objeto
    {
        $producto=Producto::findOrFail($id);
        $producto->condicion='0';
        $producto->update();
        return Redirect::to('Sistema/Producto');
    }
}