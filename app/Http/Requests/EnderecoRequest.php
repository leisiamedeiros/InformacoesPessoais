<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

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
          'tipo' => 'required|string|between:3,20',
          'numero' => 'required|string|between:1,5',
          'complemento' => 'string|between:4,40|nullable',
          'bairro' => 'required|string|between:5,30',
          'localidade' => 'required|string|between:5,30',
          'uf' => 'required|alpha|size:2',
          'cep' => 'required|digits:8',
        ];
    }

    // public function response(array $errors)
    // {
    //     return Response::json($errors, 422);
    // }
}
