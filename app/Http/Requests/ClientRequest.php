<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'salesman_id' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            'city' => 'required',
            'street' => 'required',
            'number' => 'required',
            'mobile' => 'required',
            'landline' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'birth_date.required' => 'O campo data de nascimento é obrigatório',
            'gender.required' => 'O campo Sexo é obrigatório',
            'salesman_id.required' => 'O campo vendedor é obrigatório',
            'zip_code.required' => 'O campo cep é obrigatório',
            'state.required' => 'O campo estado é obrigatório',
            'city.required' => 'O campo cidade é obrigatório',
            'street.required' => 'O campo logradouro é obrigatório',
            'number.required' => 'O campo número é obrigatório',
            'mobile.required' => 'O campo celular é obrigatório',
            'landline.required' => 'O campo telefone fixo é obrigatório'
        ];
    }
}
