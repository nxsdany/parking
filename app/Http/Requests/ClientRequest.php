<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'phone' => 'required|unique:clients|regex:/\+7[0-9]{10}/',
            'address' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо указать имя',
            'phone.required' => 'Формат номера указан не верно',
            'phone.unique' => 'Такой номер телефона уже существует'
        ];
    }
}
