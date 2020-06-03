<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacion extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'idPublicacion', 'titulo', 'texto', 'imagen','idTipo'
    ];

    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];

    protected  $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function scopeJoinPublicacionTipo($query){
        return $query->join('tipos','publicaciones.idTipo','=','tipos.idTipo');
    }
}
