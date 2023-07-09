<?php

namespace App\Http\Requests\Pasien;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'nama_pasien' => 'required',
      'nik' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required',
      'gender' => 'required',
      'alamat_pasien' => 'required',
      'agama' => 'required',
      'status_nikah' => 'required',
      'pendidikan_terakhir' => 'required',
      'pekerjaan' => 'required',
      'kewarganegaraan' => 'required',
      'penanggung_jawab' => 'required',
      'no_telp' => 'required',
      'riwayat_penyakit' => 'required',
      'riwayat_alergi' => 'required',
      // 'nama_obat' => 'required'

    ];
  }
}
