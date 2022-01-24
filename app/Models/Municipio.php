<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'enabled',
        'departamento_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/municipios/'.$this->getKey());
    }

    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }


}
