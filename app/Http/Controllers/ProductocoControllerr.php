<?php

namespace AguaymantoHotel\Http\Controllers;

use Illuminate\Http\Request;

use AguaymantoHotel\Http\Requests; // esto no se creo automaitcamente
use AguaymantoHotel\Producto;//usamos el nombre de la aplicacion para llamar al modelo
use Illuminate\Support\facades\redirecf;//hacemos referencia a Redirecf para hacer algunas redirecciones   
use AguaymantoHotel\Http\Requests\ProductoFormRequest;//hacemos referencia a FormulariodeREquerimientos
use DB;//usar la base de datos


class ProductocoControllerr extends Controller
{
    public function __constructor() //creamos el constructor
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query=trimp($request->get('searchText'));
            $productos=DB::table('producto')->where('nombre_producto','LIKE','%'.$query.'%')
            ->orderBy ('id_producto','desc')
            ->paginate(7);
            return view('almacen.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
    public function create()//Funcion para Crear en BD
    {
        return view('almacen.producto.create');
    }
    public function store(ProductoFormRequest $request)//funcion para almacenar en BD
    {
        $producto =new Producto;
        $producto->nombre_producto=$request->get('nombre_producto');
        $producto->descripcion=$request->get('descripcion');
        $producto->stock=$request->get('stock');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->save();
        return Redirect::to('almacen/producto');
    }
    public function show($id)//funcion para mostrar
    {
        return view("almacen.producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)//funcion para editar
    {
        return view("almacen.producto.edit",["producto"=>Producto::findOrFail($id)]);
    }
    public function update(ProductoFormRequest $request,$id)// funcion para actualizar
    {
        $producto=Producto::findOrFail($id);
        $producto->nombre_producto=$request->get(nombre_producto);
        $producto->descripcion=$request->get(descripcion);
        $producto->stock=$request->get(stock);
        $producto->precio_venta=$request->get(precio_venta);
        $producto->update();
        return Redirect::to('almacen/producto');

    }
    public function destroid($id)//para eliminar un objeto
    {
        $producto=Producto::findOrFail($id);
        $producto->condicion='0';
        $producto->update();
        return Redirect::to('almacen/producto');
    }
}
