<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/departamentos/'.$this->getKey());
    }

    public function municipios()
{
    return $this->hasMany(Municipio::class);
}
}
