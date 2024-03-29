<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $guarded = ['id'];
  protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'isNewPassword',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  public function perjanjians()
  {
    return $this->hasMany(Perjanjian::class);
  }
  public function pasiens() {
    return $this->hasOne(Pasien::class);
  }

  public function kritikSaran() {
    return $this->hasMany(kritikSaran::class);
  }

  public function kunjungan() {
    return $this->hasMany(kunjungan::class);
  }

  public function rawatInap() {
    return $this->hasMany(RawatInap::class);
    return $this->hasOne(kritikSaran::class);
  }
  public function dokter_rekam_medis()
  {
    return $this->hasMany(RekamMedis::class, 'dokter_id');
  }
}
