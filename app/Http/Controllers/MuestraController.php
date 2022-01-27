<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Muestra;

use Illuminate\Http\Request;

class MuestraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $muestras = Muestra::select('muestras.*','municipios.nombre as municipio');
        $muestras->join('municipios','muestras.municipio_id','=','municipios.id');

        if($request->has('municipio_id')) { $muestras = $muestras->where('muestras.municipio_id','=',$request->municipio_id); }

        $muestras = $muestras->where('muestras.enabled','=',1);
        $muestras = $muestras->orderBy('muestras.municipio_id','asc')->get();
        return $muestras;
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
        //
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
        //
    }
}
