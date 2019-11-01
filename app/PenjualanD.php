<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanD extends Model
{
  protected $table = 'penjualan_d';
  protected $guarded = [''];
  function penjualan()
  {
    return $this->belongsTo(PenjualanH::class, 'id_penjualan');
  }

  function obats()
  {
    return $this->belongsTo(Obat::class, 'id_obat');
  }
}
