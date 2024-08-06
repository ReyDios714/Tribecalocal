<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre_completo', 'celular', 'cumpleaños', 'email', 'codigo_postal', 'como_se_entero',
    ];
}

