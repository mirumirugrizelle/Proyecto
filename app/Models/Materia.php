<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'idMateria', 'nombre', 'periodo'
    ];

    public $timestamps = false;
}
