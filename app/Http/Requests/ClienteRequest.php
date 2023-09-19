<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
            'senha' => 'required'

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
            'nome min' => 'O campo nome deve conter no mínimo 5 caracteres',
            'celular.required' => 'celular obrigatório',
            'celular.max' => 'O celular deve conter no maximo 11 caracteres',
            'celular.min' => 'O celular deve conter no mínimo 10 caracteres',
            'descricao.unique' => 'descrição já cadastrado no sistema ',
            'duracao.required' => 'A duração obrigatório',
            'preco.required' => 'preco obrigatório',
            'preco.preco' => 'Formato de preco invalido',
            'preco.unique' => 'preco já cadastrado no sistema',


        ];
    }
}
