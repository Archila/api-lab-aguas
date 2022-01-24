<?php

namespace App\Http\Controllers;

use App\Models\CategoriaEstudio;
use App\Models\Estudio;

use Illuminate\Http\Request;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estudios = Estudio::select('estudios.*','categoria_estudios.nombre as categoria');
        $estudios->join('categoria_estudios','estudios.categoria_id','=','categoria_estudios.id');

        if($request->has('categoria_id')) { $estudios = $estudios->where('estudios.categoria_id','=',$request->categoria_id); }

        $estudios = $estudios->where('categoria_estudios.enabled','=',1);
        $estudios = $estudios->where('estudios.enabled','=',1);
        $estudios = $estudios->orderBy('estudios.categoria_id','asc')->get();
        return $estudios;
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
            $estudio = new Estudio();
            $estudio->nombre = $request->nombre;
            $estudio->descripcion = $request->descripcion;
            $estudio->codigo = $request->codigo;
            $estudio->categoria_id = $request->categoria_id;
            $estudio->save();

            $success=true;
            $message = 'Estudio ingresado exitosamente';

        } else { //Editar registro

            $estudio = Estudio::findOrFail($request->id);
            $estudio->nombre = $request->nombre;
            $estudio->descripcion = $request->descripcion;
            $estudio->codigo = $request->codigo;
            $estudio->categoria_id = $request->categoria_id;
            $estudio->save();

            $success=true;
            $message = 'Estudio editado exitosamente';
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
        $estudio = Estudio::findOrFail($id);
        $estudio->enabled = 0;
        $estudio->save();


        $success=true;
        $message = 'Estudio eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
