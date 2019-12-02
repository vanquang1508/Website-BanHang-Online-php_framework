<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $timestamp = true;
    protected $hidden = [
        'password', 'remember_token',
    ];
}
