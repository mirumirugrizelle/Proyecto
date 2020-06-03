<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = [
        'idProfesor', 'cedula', 'grado_academico'
    ];

    public $timestamps = false;
}
