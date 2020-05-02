<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends  Authenticatable
{
    use Notifiable;

        // protected $table = 'vp_clients';
        protected $guard = 'clients';

        protected $fillable = [
            'name', 'email', 'password','phone','address','sex','image'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
