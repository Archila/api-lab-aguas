<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaParametro extends Model
{
    protected $fillable = [
        'codigo',
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
        return url('/admin/categorias-parametros/'.$this->getKey());
    }
}
