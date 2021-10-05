<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserDetailStoreRequest extends FormRequest
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
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'degree' => 'nullable|string',
            'birthdate' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'postalCode' => 'required',
            'city' => 'required|string',
        ];
    }

    /**
     *  Get the own validation rules that apply to the request.
     * @return array
     */
    public function messages()
    {
        return [
            'firstName.required' => 'Krstné meno je povinný údaj.',
            'lastName.required' => 'Priezvisko je povinný údaj.',
            'birthdate.required' => 'Dátum narodenia je povinný údaj.',
            'phone.required' => 'Telefónne číslo je povinný údaj.',
            'street.required' => 'Ulica je povinný údaj.',
            'postalCode.required' => 'PSČ je povinný údaj.',
            'city.required' => 'Mesto je povinný údaj.',
        ];
    }
}
