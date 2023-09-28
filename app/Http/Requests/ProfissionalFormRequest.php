<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'nome' => 'required|max:80|min:5',
            'celular' => 'required|max:11|min:10',
            'e-mail' => 'required|max:120',
            'cpf' => 'required|max:11|min:11',
            'DatadeNascimento' => 'required',
            'cidade' => 'required|max:120',
            'estado' => 'required|max:2|min:2',
            'pais' => 'required|max:80',
            'rua' => 'required|max:120',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:100',
            'cep' => 'required|max:8|min:8',
            'senha' => 'required',
            'salario' => 'required'

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }


    public function messages()
    {
        return [
            'id.required' => 'O campo id é obrigatório',
            'name.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',
            'celular.required' => 'celular obrigatório',
            'celular.max' => 'O celular deve conter no maximo 11 caracteres',
            'celular.min' => 'O celular deve conter no mínimo 10 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O email deve conter no máximo 150 caracteres',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.max' => 'O campo cpf deve conter no maximo 11 caracteres',
            'cpf.min' => 'O campo cpf deve conter no mínimo 11 caracteres',
            'DatadeNascimento.required' => 'O campo DatadeNascimento é obrigatório',
            'cidade.required' => 'O campo cidade é obrigatório ',
            'cidade.max' => 'A cidade deve conter no máximo 120 caracteres',
            'estado.required' => 'O campo cep é obrigatório',
            'estado.max' => 'O campo estado deve conter no maximo 2 caracteres',
            'estado.min' => 'O campo estado deve conter no mínimo 2 caracteres',
            'pais.required' => 'O campo pais é obrigatório',
            'pais.max' => 'A pais deve conter no máximo 80 caracteres',
            'rua.required' => 'O campo rua é obrigatório',
            'rua.max' => 'A rua deve conter no máximo 120 caracteres',
            'numero.required' => 'O campo numero é obrigatório',
            'numero.max' => 'A numero deve conter no máximo 10 caracteres',
            'bairro.required' => 'O campo bairro é obrigatório',
            'bairro.max' => 'A bairro deve conter no máximo 100 caracteres',
            'cep.required' => 'O campo cep é obrigatório',
            'cep.max' => 'O campo cep deve conter no maximo 2 caracteres',
            'cep.min' => 'O campo cep deve conter no mínimo 2 caracteres',
            'senha.required' => 'O campo senha é obrigatório',
            'salario.required' => 'O campo salario é obrigatório'


        ];
    }
}
