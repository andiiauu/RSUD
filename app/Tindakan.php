<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';
    protected $guarded =[''];

    function pasien()
    {
      return $this->belongsToMany(Pasien::class)->withPivot(['tanggal_berkunjung', 'keterangan', 'id']);
    }
}
