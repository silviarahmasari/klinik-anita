<?php

namespace App\Http\Requests\RawatInap;

use Illuminate\Foundation\Http\FormRequest;

class RawatInapRequest extends FormRequest
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
      'pasien_id' => 'required',
      'check_in' => 'required',
      // 'check_out' => 'required',
      'kamar' => 'required',
    ];
  }
}
