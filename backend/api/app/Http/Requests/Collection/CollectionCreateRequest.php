<?php

namespace App\Http\Requests\Collection;

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
            'name' => 'required',
            'collection_type' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da coleção é obrigatório.',
            'collection_type.required' => 'O tipo da coleção é obrigatório.'
        ];
    }
}
