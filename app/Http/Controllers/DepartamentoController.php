<?php

namespace App\Http\Controllers;

use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $departamentos = Departamento::where('enabled','=',1)->get();

        return $departamentos;
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
            $departamento = new Departamento();
            $departamento->nombre = $request->nombre;
            $departamento->descripcion = $request->descripcion;
            $departamento->codigo = $request->codigo;
            $departamento->save();

            $success=true;
            $message = 'Departamento ingresado exitosamente';

        } else { //Editar registro

            $departamento = Departamento::findOrFail($request->id);
            $departamento->nombre = $request->nombre;
            $departamento->descripcion = $request->descripcion;
            $departamento->codigo = $request->codigo;
            $departamento->save();

            $success=true;
            $message = 'Departamento editado exitosamente';
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
        $departamento = Departamento::findOrFail($id);
        $departamento->enabled = 0;
        $departamento->save();


        $success=true;
        $message = 'Departamento eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
