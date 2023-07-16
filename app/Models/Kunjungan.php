<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $table = 'kunjungan';
    protected $guarded = ['id'];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
