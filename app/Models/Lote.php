<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $fillable = [
        'no',
        'remitente',
        'fecha',
        'boleta',
        'cantidad_muestras',
        'cadena',
        'no_cadena',
        'refrigerado',
        'tomado_por',
        'persona_entrega',
        'contacto',
        'observaciones',
        'enabled',
        'proyecto_id',
    
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
        return url('/admin/lotes/'.$this->getKey());
    }
}
