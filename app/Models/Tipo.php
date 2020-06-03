<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'idTipo', 'nombre'
    ];
    public $timestamps = false;
}
