<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorikamar extends Model
{
    protected $guarded = [''];

    function kamar()
    {
      return $this->hasMany(Kamar::class);
    }
}
