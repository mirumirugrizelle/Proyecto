<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable implements JWTSubject
{
    public $timestamps = false;
    use Notifiable;

    protected $table = 'administradores';

    protected $fillable = [
        'idAdministrador','contrasena'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function scopeJoinPersonaAdministrador($query){
        return $query->join('personas','administradores.idAdministrador','=','personas.CURP');
    }

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
