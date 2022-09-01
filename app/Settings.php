<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
      'slug',
      'value',
    ];

    public $timestamps = false;

    public function scopeSlugValue($query, $slug)
    {
        return $query->where('slug', $slug)->value('value');
    }
}
