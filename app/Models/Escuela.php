<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $fillable = [
        'CCT', 'nombre'
    ];
    public $timestamps = false;
}
