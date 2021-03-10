<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Template;

class CreateTemplateRequest extends FormRequest
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
        $template=Template::where('id',1)->first();
        return [
            'rows'=>['required','numeric','min:1','max:'.$template->rows],
            'columns'=>['required','numeric','min:1','max:'.$template->columns],
        ];
    }

    public function messages()
    {
        $template=Template::where('id',1)->first();
        return [
            'rows.required' => 'Este campo es obligatorio',
            'rows.numeric' => 'Debe ser un número',
            'rows.min' => 'minimo 1 y máximo '.$template->rows,
            'rows.max' => 'minimo 1 y máximo '.$template->rows,
            'columns.required' => 'Este campo es obligatorio',
            'columns.numeric' => 'Debe ser un número',
            'columns.min' => 'minimo 1 y máximo '.$template->columns,
            'columns.max' => 'minimo 1 y máximo '.$template->columns,
        ];
    }
}
