<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::where('activo','=','1')->get();

        return $clientes;
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
            $cliente = new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->telefono = $request->telefono;
            $cliente->ubicacion = $request->ubicacion;
            $cliente->direccion = $request->direccion;
            $cliente->correo = $request->correo;
            $cliente->contacto = $request->contacto;

            $cliente->save();

            $success=true;
            $message = 'Cliente ingresado exitosamente';

        } else { //Editar registro

            $cliente = Cliente::findOrFail($request->id);
            $cliente->nombre = $request->nombre;
            $cliente->telefono = $request->telefono;
            $cliente->ubicacion = $request->ubicacion;
            $cliente->direccion = $request->direccion;
            $cliente->correo = $request->correo;
            $cliente->contacto = $request->contacto;
            $cliente->save();

            $success=true;
            $message = 'Cliente editado exitosamente';
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
        $cliente = Cliente::findOrFail($id);
        $cliente->activo = 0;
        $cliente->save();

        $success=true;
        $message = 'Cliente eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
