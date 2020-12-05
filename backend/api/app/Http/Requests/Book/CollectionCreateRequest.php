<?php

namespace App\Http\Requests\Book;

use \Urameshibr\Requests\FormRequest;

class CollectionCreateRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do livro é obrigatório.',
            'name.string' => 'Nome inválido.'
        ];
    }
}
