<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'grado', 'letra'
    ];

    public $timestamps = false;
}
