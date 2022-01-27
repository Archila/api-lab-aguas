<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Lote;
use App\Models\Muestra;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lotes = Lote::select('lotes.*','proyectos.nombre as proyecto');
        $lotes->join('proyectos','lotes.proyecto_id','=','proyectos.id');

        if($request->has('proyecto_id')) { $lotes = $lotes->where('lotes.proyecto_id','=',$request->proyecto_id); }

        $lotes = $lotes->where('proyectos.enabled','=',1);
        $lotes = $lotes->where('lotes.enabled','=',1);
        $lotes = $lotes->orderBy('lotes.proyecto_id','asc')->get();
        return $lotes;
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
            $lote = new Lote();
            $lote->no = $request->no;
            $lote->remitente = $request->remitente;
            $lote->fecha = $request->fecha;
            $lote->boleta = $request->boleta;
            $lote->cantidad_muestras = $request->cantidad_muestras;            
            $lote->cadena = $request->no_cadena == ''?false:true;                        
            $lote->no_cadena = $request->no_cadena;
            $lote->refrigerado = $request->refrigerado;
            $lote->tomado_por = $request->tomado_por;
            $lote->persona_entrega = $request->persona_entrega;
            $lote->contacto = $request->contacto;
            $lote->observaciones = $request->observaciones;
            $lote->enabled = $request->enabled;
            $lote->proyecto_id = $request->proyecto_id;
            $lote->save();

            for ($i=0; $i < $request->cantidad_muestras; $i++) { 
                $muestra = new Muestra();
                $caracter = chr(65+$i);
                $muestra->identificador = $request->no.'-'.$caracter;
                $muestra->descripcion = 'PENDIENTE';
                $muestra->procedencia = 'PENDIENTE';
                $muestra->fecha = $lote->fecha;
                $muestra->recipiente = 'PENDIENTE';
                $muestra->volumen = 'PENDIENTE';
                $muestra->enabled = 1;
                $muestra->lote_id = $lote->id;
                $muestra->municipio_id = 1;
                $muestra->save();
            }

            $success=true;
            $message = 'Lote ingresado exitosamente';

        } else { //Editar registro

            $lote = Lote::findOrFail($request->id);
            $lote->no = $request->no;
            $lote->remitente = $request->remitente;
            $lote->fecha = $request->fecha;
            $lote->boleta = $request->boleta;
            $lote->cantidad_muestras = $request->cantidad_muestras;       
            $lote->cadena = $request->no_cadena == ''?false:true;        
            $lote->no_cadena = $request->no_cadena;
            $lote->refrigerado = $request->refrigerado;
            $lote->tomado_por = $request->tomado_por;
            $lote->persona_entrega = $request->persona_entrega;
            $lote->contacto = $request->contacto;
            $lote->observaciones = $request->observaciones;
            $lote->enabled = $request->enabled;
            $lote->proyecto_id = $request->proyecto_id;
            $lote->save();

            $success=true;
            $message = 'Lote editado exitosamente';
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
        $lote = Lote::findOrFail($id);
        $lote->enabled = 0;
        $lote->save();


        $success=true;
        $message = 'Lote eliminado exitosamente';

        return response()->json(['success'=>$success, 'message'=>$message]);
    }
}
