<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriobat extends Model
{
    protected $guarded = [''];

    function obat()
    {
      return $this->hasMany(Obat::class);
    }
}
