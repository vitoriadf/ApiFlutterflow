<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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
            'nome'=> 'required |min:3|max:255|unique:produtos',
            'quantidade'=> 'required |min:1|max:255|',
            'preco'=> 'required |min:2|max:255|',
            'marca'=> 'required |min:1|max:255|',
            'categoria'=> 'required |min:1|max:255|',
            'cor'=> 'required |min:1|max:255|',
        ];
    }
}
