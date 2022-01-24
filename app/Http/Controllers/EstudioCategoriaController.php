<?php

namespace App\Http\Controllers;

use App\Models\CategoriaEstudio;
use App\Models\Estudio;

use Illuminate\Http\Request;

class EstudioCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = CategoriaEstudio::where('enabled','=',1)->get();

        return $categorias;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //Nuevo Ingreso
        if($request->id == 0) {
            $categoria = new CategoriaEstudio();
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            $success=true;
            $message = 'Categoría ingresada exitosamente';

        } else { //Editar registro

            $categoria = CategoriaEstudio::findOrFail($request->id);
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            $success=true;
            $message = 'Categoría editada exitosamente';
        }

        return response()->json(['success'=>$success, 'message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = CategoriaEstudio::findOrFail($id);
        $categoria->enabled = 0;
        $categoria->save();


        $success=true;
        $message = 'Categoría eliminada exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
