<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'ubicacion',
        'correo',
        'contacto',
        'activo',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/clientes/'.$this->getKey());
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
