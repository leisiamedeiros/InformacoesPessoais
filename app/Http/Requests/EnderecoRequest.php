<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
          'nome' => 'required|string|between:5,40',
          'tipo' => 'string|between:3,20',
          'numero' => 'required|string|between:1,5',
          'complemento' => 'string|between:4,40',
          'bairro' => 'required|string|between:5,30',
          'localidade' => 'required|string|between:5,30',
          'uf' => 'required|string|size:2',
          'cep' => 'required|string|size:8',
        ];
    }
}
