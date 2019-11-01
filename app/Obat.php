<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = [''];

    function kategoriobat()
    {
      return $this->belongsTo(Kategoriobat::class);
    }

    function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }

  

  }
