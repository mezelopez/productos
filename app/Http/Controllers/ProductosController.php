<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    //
    public function store(Request $request){

    	$request->validate([
    		'nombre' => 'required|min:3',
    		'descripcion' => 'required|min:5',
    		'precio' => 'required',
    		'stock' => 'required',
    	]);

    	$producto = new Producto;

    	$producto->nombre = $request->nombre;
    	$producto->descripcion = $request->descripcion;
    	$producto->precio = $request->precio;
    	$producto->stock = $request->stock;

    	$producto->save();
    	return redirect()->route('index')->with('success','Producto almacenado correctamente');

    }

	public function index(){
		$productos = Producto::all();
		return view('productos.index',['productos' => $productos]);
	} 

	public function show($id){
		$producto = Producto::find($id);
		return view('productos.show',['producto' => $producto]);
	} 	

	public function update(Request $request, $id){
		$producto = Producto::find($id);
		$producto->nombre = $request->nombre;
		$producto->descripcion = $request->descripcion;
		$producto->precio = $request->precio;
		$producto->stock = $request->stock;
		$producto->save();

		return redirect()->route('index')->with('success','Producto actualizado!');
	} 	   

	public function destroy($id){
		$producto = Producto::find($id);
		$producto->delete();
		return redirect()->route('index')->with('success','Producto eliminado!');
	} 
}
