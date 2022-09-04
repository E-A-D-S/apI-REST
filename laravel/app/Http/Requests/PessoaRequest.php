<?php

namespace App\Http\Requests;

class PessoaRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nome" => "required|min:3",
            "sobrenome" => "required|min:3",
            "idade" => "required|numeric|min:2",
            "login" => "required|min:8",
            "senha" => "required|min:8",
            "status" => "required|numeric|min:1"
        ];
    }

}