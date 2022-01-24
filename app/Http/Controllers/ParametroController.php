<?php

namespace App\Http\Controllers;

use App\Models\CategoriaParametro;
use App\Models\Parametro;

use Illuminate\Http\Request;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parametros = Parametro::select('parametros.*','categoria_parametros.nombre as categoria');
        $parametros->join('categoria_parametros','parametros.categoria_id','=','categoria_parametros.id');

        if($request->has('categoria_id')) { $parametros = $parametros->where('parametros.categoria_id','=',$request->categoria_id); }

        $parametros = $parametros->where('categoria_parametros.enabled','=',1);
        $parametros = $parametros->where('parametros.enabled','=',1);
        $parametros = $parametros->orderBy('parametros.categoria_id','asc')->get();
        return $parametros;
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
            $parametro = new Parametro();
            $parametro->nombre = $request->nombre;
            $parametro->nombre_estandard = $request->nombre_estandard;
            $parametro->codigo = $request->codigo;
            $parametro->codigo_sm = $request->codigo_sm;
            $parametro->alternativas = $request->alternativas;
            $parametro->test_compartidos = $request->test_compartidos;
            $parametro->tipo_metodo = $request->tipo_metodo;
            $parametro->principio = $request->principio;
            $parametro->unidades = $request->unidades;
            $parametro->metodo = $request->metodo;
            $parametro->rango = $request->rango;
            $parametro->compatible = $request->compatible;
            $parametro->categoria_id = $request->categoria_id;
            $parametro->save();

            $success=true;
            $message = 'Parámetro ingresado exitosamente';

        } else { //Editar registro

            $parametro = Parametro::findOrFail($request->id);
            $parametro->nombre = $request->nombre;
            $parametro->nombre_estandard = $request->nombre_estandard;
            $parametro->codigo = $request->codigo;
            $parametro->codigo_sm = $request->codigo_sm;
            $parametro->alternativas = $request->alternativas;
            $parametro->test_compartidos = $request->test_compartidos;
            $parametro->tipo_metodo = $request->tipo_metodo;
            $parametro->principio = $request->principio;
            $parametro->unidades = $request->unidades;
            $parametro->metodo = $request->metodo;
            $parametro->rango = $request->rango;
            $parametro->compatible = $request->compatible;
            $parametro->categoria_id = $request->categoria_id;
            $parametro->save();

            $success=true;
            $message = 'Parámetro editado exitosamente';
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
        $parametro = Parametro::findOrFail($id);
        $parametro->enabled = 0;
        $parametro->save();


        $success=true;
        $message = 'Parámetro eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
