<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoMateriaAula extends Model
{
    protected $fillable = [
        'grado', 'letra', 'idMateria','idProfesor','idAula','hora'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected  $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function scopeJoinGrupoMateria($query){
        return $query->join('materias','grupos_materias_aulas.idMateria','=','materias.idMateria');
    }
    public function scopeJoinGrupoAula($query){
        return $query->join('aulas','grupos_materias_aulas.idAula','=','aulas.idAula');
    }
    public function scopeJoinGrupoProfesor($query){
        return $query->join('profesores','grupos_materias_aulas.idProfesor','=','profesores.idProfesor');
    }

}
