<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaEstudio extends Model
{
    protected $fillable = [
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
        return url('/admin/categoria-estudios/'.$this->getKey());
    }
}
