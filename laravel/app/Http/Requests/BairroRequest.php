<?php

namespace App\Http\Requests;

class UFRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "codigo_bairro" => "required|numeric|min:1",
            "nome" => "required|min:3",
            "status" => "required|numeric"
        ];
    }
}