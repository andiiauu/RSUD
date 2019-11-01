<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasieninap extends Model
{
    protected $guarded = [''];

    function kamar()
    {
      return $this->belongsTo(Kamar::class);
    }
}
