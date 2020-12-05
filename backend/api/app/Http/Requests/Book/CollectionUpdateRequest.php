<?php

namespace App\Http\Requests\Book;

use \Urameshibr\Requests\FormRequest;

class CollectionUpdateRequest extends FormRequest
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
            'loaned' => 'required|boolean',
            'collection_type' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do livro é obrigatório.',
            'loaned.required' => 'Favor informar se o livro está emprestado.',
            'loaned.boolean' => 'Atributo :attribute inválido.',
            'collection_type.required' => 'O tipo da coleção é obrigatório.'
        ];
    }
}