<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkStoreRequest extends FormRequest
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
            'employer' => 'required',
            'job_title' => 'required',
            'city' => 'required',
            'start' => 'required',
            'end' => 'nullable|date',
            'description' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'employer.required' => 'Názov organizácie je povinný údaj.',
            'job_title.required' => 'Názov pracovnej pozície je povinný údaj.',
            'start.required' => 'Začiatok štúdia je povinný údaj.',
            'city.required' => 'Mesto je povinný údaj.',
        ];
    }
}
