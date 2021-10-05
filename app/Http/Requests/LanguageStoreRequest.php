<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageStoreRequest extends FormRequest
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
            'language' => 'required',
            'level' => 'required',
        ];
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'language.required' => 'Povinný údaj.',
            'level.required' => 'Úroveň je povinný údaj.',
        ];
    }
}
