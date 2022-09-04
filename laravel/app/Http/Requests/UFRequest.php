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
            "sigla" => "required|min:2",
            "nome" => "required|min:3",
            "status" => "required|numeric|min:1"
        ];
    }

}