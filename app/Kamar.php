<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
  protected $guarded = [''];

  function kategorikamar()
  {
    return $this->belongsTo(Kategorikamar::class);
  }

  function pasien()
  {
    return $this->hasMany(Pasien::class);
  }
}
