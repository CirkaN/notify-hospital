<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalStoreRequest extends FormRequest
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
            'hospital_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hospital_name' => 'required',
            'hospital_serial' => 'required|max:8',
        ];
    }
    
}
