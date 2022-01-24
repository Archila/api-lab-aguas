<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    protected $fillable = [
        'identificador',
        'descripcion',
        'id_en_campo',
        'latitud',
        'longitud',
        'procedencia',
        'ubicacion',
        'fecha',
        'temperatura',
        'pH',
        'conductividad',
        'sdt',
        'materia_flotante',
        'simple',
        'recipiente',
        'volumen',
        'preservante',
        'concentracion',
        'recipiente_para',
        'microbiologia',
        'volumen_microbiologia',
        'enabled',
        'lote_id',
        'municipio_id',
    
    ];
    
    
    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/muestras/'.$this->getKey());
    }
}
