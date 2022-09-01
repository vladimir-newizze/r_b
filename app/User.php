<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'customer_id', 'phone'
    ];

    protected $hidden = [
        'customer_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
