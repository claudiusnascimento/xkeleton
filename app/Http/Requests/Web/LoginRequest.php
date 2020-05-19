<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    protected $errorBag = 'login';

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
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];
    }

    public function messages() {

        return [
            'email.required' => 'O e-mail é obrigatório',
            'email.string' => 'E-mai não deve ser vazio',
            'email.email' => 'E-mail inválido',
            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha não deve ser vazia'
        ];
    }

}
