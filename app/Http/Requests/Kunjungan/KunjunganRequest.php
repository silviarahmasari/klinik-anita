<?php

namespace App\Http\Requests\Kunjungan;

use Illuminate\Foundation\Http\FormRequest;

class KunjunganRequest extends FormRequest
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
            'tgl_kunjungan' => 'required',
            'nama_lengkap' => 'required',
            'keluhan' => 'required',
            'no_telp' => 'required',
            'triase_tujuan' => 'required',
        ];
    }
}
