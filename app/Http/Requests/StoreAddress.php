<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddress extends FormRequest
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
            'last_name' => 'required_unless:professionnal,"on"|string|max:100',
            'first_name' => 'required_unless:professionnal,"on"|string|max:100',
            'company' => 'exclude_unless:professionnal,"on"|string|max:100',
            'address' => 'required|string|max:255',
            'address_bis' => 'nullable|string|max:255',
            'bp' => 'nullable|string|max:100',
            'postal' => 'required|numeric',
            'city' => 'required|string|max:100',
            'phone' => 'required|numeric',
        ];
    }
}
