<?php

namespace App\Http\Requests;

class MunicipioRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "codigo_uf" => "required|min:1",
            "nome" => "required|min:3",
            "status" => "required|numeric|min:1"
        ];
    }

}