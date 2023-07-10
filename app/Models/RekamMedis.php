<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['dokter_id', 'pasien_id', 'anamnesa_pemeriksaan_medis', 'diagnosa', 'terapi', 'obat', 'tgl_pemeriksaan_medis'];

    public function rekam_medis_pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function rekam_medis_dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function rekam_medis_obat()
    {
        return $this->belongsTo(Obat::class, 'obat');
    }
}
