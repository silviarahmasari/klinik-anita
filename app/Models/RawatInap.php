<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;
    protected $table = 'rawat_inap';
    protected $fillable = [
        'id',
        'id_kamar',
        'no_rm',
        'nama_pasien',
        'check_in',
        'check_out',
        'status_pembayaran',
        'created_at',
        'updated_at',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
