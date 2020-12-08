<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Rubros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Productos::all();
        return view('productos.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $datosRubros['rubros']= Rubros::all();
        return view('productos.create',$datosRubros);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosProductos=request()->all(); info sirve p agregar dicho producto

        $datosProductos=request()->except('_token');

        if($request->hasFile('Imagen')){

            $datosProductos['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        Productos::insert($datosProductos);

        //return response()->json($datosProductos);
        return redirect('productos')->with('Mensaje','Producto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            //
            //$producto = Producto::findOrFail($id);
            $producto = Productos::leftJoin('rubros', 'rubros.id', '=', 'productos.idRubro')
                                ->select('productos.*', 'rubros.nombre as rubro')
                                ->findOrFail($id);
            //dd($producto);
            $datosRubro = Rubros::all();
            //$rubroProducto = null;

            return view('productos.edit', ['producto' => $producto, 'rubros' => $datosRubro]);

            //'rubroProducto' => $rubroProducto,
            //'datosRubros' => $datosRubro


        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosProducto = request()->except(['_token','_method']);

        // $producto = Productos::findOrFail($id);
        // return view ('productos.edit', compact('producto'));

        if($request->hasFile('Imagen')){

            $producto = Productos::findOrFail($id);

            Storage::delete('public/'.$producto->Imagen);

            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Productos::where('id','=',$id)->update($datosProducto);

        return redirect('productos')->with('Mensaje', 'Producto actualizado');

    }

    public function destroy($id)
    {
        //
        $producto= Productos::findOrFail($id);

        if(Storage::delete('public/'.$producto->Imagen)){
            Productos::destroy($id);
        }
        Productos::destroy($id);

        return redirect('productos')->with('Mensaje', 'Producto eliminado con éxito');
    }
}
