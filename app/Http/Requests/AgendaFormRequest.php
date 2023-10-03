<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cliente_id' => 'required|integer',
            'profissional_id' => 'required',
            'data_hora' => 'required|date',
            'serviço_id' => 'required|integer',
            'tipo_pagamento' => 'required|max:20|min:3',
            'valor' => 'required'

        ];
    }

    public function failedValidation(ValidationValidator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }


    public function messages()
    {
        return [
            'cliente_id.required' => 'O campo cliente é obrigatório',
            'profissional_id.required' => 'O campo profissional é obrigatório',
            'data_hora.required' => 'O campo data e hora é obrigatório',
            'serviço_id.required' => 'O campo serviço é obrigatório',
            'tipo_pagamento.required' => 'O campo tipo de pagamento é obrigatório',
            'tipo_pagamento.max' => 'O campo tipo de pagamento deve conter no maximo 20 caracteres',
            'tipo_pagamento.min' => 'O campo tipo de pagamento deve conter no mínimo 20 caracteres',
            'valor.required' => 'O campo valor é obrigatório'

        ];
    }
}
