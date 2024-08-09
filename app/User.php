<?php

// app/User.php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'usuario', 'email', 'password', 'idrol'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'usuario';
    }

    public function getAuthIdentifier()
    {
        return $this->usuario;
    }
}




