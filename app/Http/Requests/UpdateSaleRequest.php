<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
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
            'customer_id' => ['required', 'exists:customers,id'],

            'product_id' => ['required', 'exists:products,id'],
            
            'payment' => ['required', 'in:pix,money,card,ticket'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'customer_id.required' => 'O cliente é obrigatório.',
            'customer_id.exists' => 'O cliente selecionado é inválido.',

            'product_id.required' => 'O produto é obrigatório.',
            'product_id.exists' => 'O produto selecionado é inválido.',

            'payment.required' => 'O método de pagamento é obrigatório.',
            'payment.in' => 'O método de pagamento selecionado é inválido.',

        ];
    }
}
