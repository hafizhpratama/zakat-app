<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class BayarZakatRequest extends FormRequest
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
            'nama_pengirim' => 'required|max:255',
            'asal_bank' => 'required|max:255',
            'jenis_zakat' => 'required|max:255',
            'nominal' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => '',
            'users_id' => ''
        ];
    }
}
