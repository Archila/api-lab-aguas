<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proyectos = Proyecto::select('proyectos.*','clientes.nombre as cliente');
        $proyectos->join('clientes','proyectos.cliente_id','=','clientes.id');

        if($request->has('cliente_id')) { $proyectos = $proyectos->where('proyectos.cliente_id','=',$request->cliente_id); }

        $proyectos = $proyectos->where('clientes.activo','=',1);
        $proyectos = $proyectos->where('proyectos.enabled','=',1);
        $proyectos = $proyectos->orderBy('proyectos.id','desc')->get();
        return $proyectos;
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
            $proyecto = new Proyecto();
            $proyecto->nombre = $request->nombre;
            $proyecto->fecha = $request->fecha;
            $proyecto->hora = $request->hora;
            $proyecto->cliente_id = $request->cliente_id;
            $proyecto->save();

            $success=true;
            $message = 'Proyecto ingresado exitosamente';

        } else { //Editar registro

            $proyecto = Proyecto::findOrFail($request->id);
            $proyecto->nombre = $request->nombre;
            $proyecto->fecha = $request->fecha;
            $proyecto->hora = $request->hora;
            $proyecto->cliente_id = $request->cliente_id;
            $proyecto->save();

            $success=true;
            $message = 'Proyecto editado exitosamente';
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
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->enabled = 0;
        $proyecto->save();


        $success=true;
        $message = 'Proyecto eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
