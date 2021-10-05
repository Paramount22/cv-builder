<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school_name' => 'required',
            'field_of_study' => 'nullable|string',
            'city' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'school_name.required' => 'Názov školy je povinný údaj.',
            'start.required' => 'Začiatok štúdia je povinný údaj.',
            'end.required' => 'Koniec štúdia je povinný údaj.',
            'city.required' => 'Mesto je povinný údaj.',
        ];
    }
}
