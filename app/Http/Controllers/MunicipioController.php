<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;

use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   
        $municipios = Municipio::select('municipios.*','departamentos.nombre as departamento');
        $municipios->join('departamentos','municipios.departamento_id','=','departamentos.id');

        if($request->has('departamento_id')) { $municipios = $municipios->where('municipios.departamento_id','=',$request->departamento_id); }

        $municipios = $municipios->where('departamentos.enabled','=',1);
        $municipios = $municipios->orderBy('municipios.departamento_id','asc')->get();
        return $municipios;
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
            $municipio = new Municipio();
            $municipio->nombre = $request->nombre;
            $municipio->descripcion = $request->descripcion;
            $municipio->codigo = $request->codigo;
            $municipio->departamento_id = $request->departamento_id;
            $municipio->save();

            $success=true;
            $message = 'Municipio ingresado exitosamente';

        } else { //Editar registro

            $municipio = Municipio::findOrFail($request->id);
            $municipio->nombre = $request->nombre;
            $municipio->descripcion = $request->descripcion;
            $municipio->codigo = $request->codigo;
            $municipio->departamento_id = $request->departamento_id;
            $municipio->save();

            $success=true;
            $message = 'Municipio editado exitosamente';
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
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();

        $success=true;
        $message = 'Municipio eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
