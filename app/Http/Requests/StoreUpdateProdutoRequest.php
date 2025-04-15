<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;


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
        $produtoId = $this->route('produto');

        return [
            'nome'=> ['required','min:3','max:255',Rule::unique('produtos')->ignore($produtoId)],
            'quantidade'=> 'required|integer |min:1|max:100000|',
            'preco'=> 'required|numeric |min:1|max:100000|',
            'marca_id'=> 'required |min:1|max:255|',
            'categoria_id'=> 'required |min:1|max:255|',
            'cor_id'=> 'required |min:1|max:255|',
            'tecido_id'=> 'required |min:1|max:255|',

        ];
    }
}
