<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class VendedorRequest extends FormRequest
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
            'ven_nome' => 'required|max:150',
            'ven_cpf' => 'required|unique:vendedores,ven_cpf,'.$this->get("ven_id").',ven_id',
            'ven_sexo' => 'required',
            'ven_nascimento' => 'required',
            'ven_ativo' => 'required'
        ];
    }
}
