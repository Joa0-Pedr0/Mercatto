<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'cnpj' => ['required','string','max:18'],
            'products' => ['required','string', 'max:500'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do fornecedor é obrigatório.',
            'name.max' => 'O nome do fornecedor não pode exceder 255 caracteres.',

            'cnpj.required' => 'O CNPJ do fornecedor é obrigatório.',
            'cnpj.max' => 'O CNPJ do fornecedor não pode exceder 18 caracteres.',
            
            'products.required' => 'Os produtos fornecidos são obrigatórios.',
            'products.max' => 'A lista de produtos fornecidos não pode exceder 500 caracteres.',
        ];
    }
}
