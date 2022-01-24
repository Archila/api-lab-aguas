<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = [
        'categoria_id',
        'codigo',
        'descripcion',
        'enabled',
        'nombre',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/estudios/'.$this->getKey());
    }
}
