<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|unique:doctors|',
            'speciality' => 'required|max:255',
            'hospital' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Doctor name is required!',
            'surname.required' => 'Doctor surname is required!',
            'email.required' => 'Doctor email is required!',
            'speciality.required' => 'Speciality is required',
            'hospital.required' => 'You must select hospital where doctor is working',
        ];
    }
}
