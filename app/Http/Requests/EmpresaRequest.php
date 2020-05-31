<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'nome' => 'required|min:8',
            'email' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'pais' => 'required',
            'celular' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Esse campo é obrigatorio',
            'min' => 'Esse campo deve conter :min caracteres'
        ];
    }
}
