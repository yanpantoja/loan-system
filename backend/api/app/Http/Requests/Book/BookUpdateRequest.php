<?php

namespace App\Http\Requests\Book;

use \Urameshibr\Requests\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'loaned' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do livro é obrigatório.',
            'loaned.required' => 'Favor informar se o livro está emprestado.',
            'loaned.boolean' => 'Atributo :attribute inválido.',
        ];
    }
}
