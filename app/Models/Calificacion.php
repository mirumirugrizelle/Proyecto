<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $fillable = [
        'idAlumno', 'idMateria', 'p1','p2','p3','p4','p5','promedio'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected  $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeJoinCalificacionAlumno($query){
        return $query->join('alumnos','calificaciones.idAlumno','=','alumnos.idAlumno');

    }

    public function scopeJoinCalificacionMateria($query){
        return $query->join('materias','calificaciones.idMateria','=','materias.idMateria');
    }

}
