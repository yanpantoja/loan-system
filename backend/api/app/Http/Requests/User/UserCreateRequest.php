<?php

namespace App\Http\Requests\User;

use \Urameshibr\Requests\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => 'required|email:rfc'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do usuário é obrigatório.',
            'email.required' => 'O email do usuário é obrigatório.',
            'email.email' => 'E-mail inválido.'
        ];
    }
}
