<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [''];

    function obats()
    {
      return $this->hasMany(Obat::class);
    }
}
