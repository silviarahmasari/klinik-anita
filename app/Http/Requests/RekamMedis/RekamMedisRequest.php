<?php

namespace App\Http\Requests\RekamMedis;

use Illuminate\Foundation\Http\FormRequest;

class RekamMedisRequest extends FormRequest
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
      'dokter_id' => 'required',
      'pasien_id' => 'required',
      'anamnesa_pemeriksaan_medis' => 'required',
      'diagnosa' => 'required',
      'tgl_pemeriksaan_medis' => 'required',
    ];
  }
}
