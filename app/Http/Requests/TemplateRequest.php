<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
            'rows'=>['required','numeric','min:1','max:3'],
            'columns'=>['required','numeric','min:1','max:3'],
        ];
    }

    public function messages()
    {
        return [
            'rows.required' => 'Este campo es obligatorio',
            'rows.numeric' => 'Debe ser un número',
            'rows.min' => 'minimo 1 y máximo 3',
            'rows.max' => 'minimo 1 y máximo 3',
            'columns.required' => 'Este campo es obligatorio',
            'columns.numeric' => 'Debe ser un número',
            'columns.min' => 'minimo 1 y máximo 3',
            'columns.max' => 'minimo 1 y máximo 3',
        ];
    }
}
