<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'cpf' => ['required','string','max:14'],
            'address' => ['required','string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do cliente é obrigatório.',
            'name.max' => 'O nome do cliente não pode exceder 255 caracteres.',

            'cpf.required' => 'O CPF do cliente é obrigatório.',
            'cpf.unique' => 'O CPF do cliente já está em uso.',
            'cpf.max' => 'O CPF do cliente não pode exceder 14 caracteres.',

            'address.required' => 'O endereço do cliente é obrigatório.',
            'address.max' => 'O endereço do cliente não pode exceder 500 caracteres.',

        ];
    }
}
