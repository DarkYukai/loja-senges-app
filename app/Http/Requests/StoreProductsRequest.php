<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            //
            'nome' => 'required|string|min:3|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'slug' => 'required|string|max:255',
            'image' => 'nullabel|string|max:255',
            'id_category' => 'required|exists:categories,id',
            'id_user' => 'required|exists:users,id'
        ];
    }
}
