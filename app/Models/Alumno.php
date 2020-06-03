<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'promedio', 'grado', 'clase','fecha_ingreso'
    ];


    public function scopeJoinAlumnoPersona($query){
        return $query->join('personas','alumnos.idAlumno','=','personas.CURP');
    }

    public $timestamps = false;

}
