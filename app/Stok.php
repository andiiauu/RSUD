<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{

  protected $table = 'stok';
	protected $hidden = ['created_at', 'updated_at'];
    function obats()
    {
      return $this->hasMany(Obat::class);
    }

    function supplier()
    {
      return $this->hasMany(Supplier::class);
    }
}
