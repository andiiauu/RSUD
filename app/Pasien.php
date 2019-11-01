<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
  protected $guarded = [''];

  function dokter()
  {
    return $this->belongsTo(Dokter::class);
  }

  function kamar()
  {
    return $this->belongsTo(Kamar::class);
  }

  function tindakan()
  {
    return $this->belongsToMany(Tindakan::class)->withPivot(['tanggal_berkunjung', 'keterangan', 'id']);
  }

}
