<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['poli_id', 'nama', 'jenis_kelamin', 'no_telp', 'umur', 'alamat', 'created_at', 'updated_at'];

    function poli()
    {
      return $this->belongsTo(Poli::class);
    }

    function pasien()
    {
      return $this->hasMany(Pasien::class);
    }
}
