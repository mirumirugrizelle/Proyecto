<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'idBanner','titulo', 'archivo'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected  $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
