<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  public $timestamps = true;

  public function users() {
    return $this->belongsTo(User::class);
  }
  public function obats()
  {
    return $this->hasMany(Obat::class);
  }
  public function pasien_rekam_medis()
  {
    return $this->hasMany(RekamMedis::class, 'pasien_id');
  }
}
