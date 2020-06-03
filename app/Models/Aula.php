<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = [
        'idAula', 'capacidad', 'descripcion'
    ];

    public $timestamps = false;
}
