<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
{

    protected $errorBag = 'reset';

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
            'password' => 'required|string|confirmed'
        ];
    }

    public function messages() {

        return [
            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha não deve ser vazia',
            'password.confirmed' => 'Senha e confirmação de senha são diferentes'
        ];
    }

}
