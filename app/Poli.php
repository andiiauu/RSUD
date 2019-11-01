<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $fillable = ['nama', 'harga', 'created_at', 'updated_at'];

    function pasien()
    {
      return $this->hasManyThrough(Pasien::class, Dokter::class);
    }
    
    function dokter()
    {
      return $this->hasMany(Dokter::class);
    }
}
