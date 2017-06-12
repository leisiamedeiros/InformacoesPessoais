<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;
use Illuminate\Support\Facades\Auth;

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
          'cpf' => 'required|digits:11|unique:dados_pessoais,cpf,'.Auth::id().',user_id',
          'rg' => 'required|string|between:4,10|unique:dados_pessoais,rg,'.Auth::id().',user_id',
          'nascimento' => 'required|date_format:d-m-Y',
          'genero' => 'required|string|between:1,20',
        ];
    }

    // public function response(array $errors)
    // {
    //     return Response::json($errors, 422);
    // }

}
