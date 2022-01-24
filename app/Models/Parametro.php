<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $fillable = [
        'alternativas',
        'categoria_id',
        'codigo',
        'codigo_sm',
        'compatible',
        'enabled',
        'metodo',
        'nombre',
        'nombre_estandard',
        'principio',
        'rango',
        'test_compartidos',
        'tipo_metodo',
        'unidades',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/parametros/'.$this->getKey());
    }
}
