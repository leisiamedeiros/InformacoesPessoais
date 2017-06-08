<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DadosPessoaisRequest extends FormRequest
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
          'nome_completo' => 'required|string|between:5,100',
          'cpf' => 'required|string|size:11',
          'rg' => 'required|string|between:4,10',
          'nascimento' => 'required|date_format:d-m-Y',
          'genero' => 'required|string|between:1,20',
        ];
    }
}
