<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifications extends Model
{
    protected $fillable = [
        'user_id',
        'code'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
