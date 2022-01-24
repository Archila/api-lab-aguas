<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'nombre',
        'fecha',
        'enabled',
        'cliente_id',
    
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
        return url('/admin/proyectos/'.$this->getKey());
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
