<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscuelaProfesor extends Model
{
    protected $fillable = [
        'CCT', 'idProfesor'
    ];

    public function scopeJoinEscuelaProfesor($query){
        return $query->join('escuelas','escuelas_profesores.CCT','=','escuelas.CCT');
    }

    public function scopeJoinProfesorEscuela($query)
    {
        return $query->join('profesores','escuelas_profesores.idProfesor','=','profesores.idProfesor');
    }
}
