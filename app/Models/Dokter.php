<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  public function pasiens()
  {
    return $this->hasMany(Pasien::class);
  }
  public function dokter_rekam_medis()
  {
    return $this->hasMany(RekamMedis::class, 'dokter_id');
  }
}
