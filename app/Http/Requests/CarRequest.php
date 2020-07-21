<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'color' => 'required|alpha_dash',
            'number' => 'required|unique:cars|regex:/[а-я][0-9]{3}[а-я]{2}[0-9]{2,3}/iu'
        ];
    }

    public function messages()
    {
        return [
            'brand.required' => 'Необходимо заполнить марку авто',
            'model.required' => 'Необходимо заполнить модель авто',
            'color.required' => 'Цвет очень необходим',
            'number.unique' => 'Такой гос. номер уже существует',
            'number.required' => 'Номер необходим',
            'number.regex' => 'Формат номера введен не верно'
        ];
    }
}
