<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    private $protected  = 'personas';
    public $timestamps = false;

    public function scopeActivos($query,$condicion = true)
    {
        $query->where('estado',$condicion);
    }

    public function getNombresApellidos()
    {
        return $this->nombres.' '.$this->apellidos;
    }
    
}
