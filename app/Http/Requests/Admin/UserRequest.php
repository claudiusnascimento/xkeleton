<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\XRequest;
use Illuminate\Validation\Rule;

class UserRequest extends XRequest
{
    protected $checkboxes = ['active'];

    protected $toaster_message = true;

    protected $path_url = 'admin/users';

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

        $rules = [
            'name' => 'required|string|min:2',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($this->getIgnoredId())
            ]
        ];

        if($this->addPasswordRules()) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'Nome não deve ser vazio',
            'name.min' => 'O nome precisa ter no mínimo 2 catacteres',
            'email.required' => 'Preencha o e-mail',
            'email.string' => 'E-mail não deve ser vazio',
            'email.email' => 'E-mail inválido',
            'email.unique' => 'E-mail já existe',
            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha não deve ser vazia',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
            'password.confirmed' => 'A senha não é igual à confirmação de senha'
        ];
    }

    protected function addPasswordRules() {

        return $this->path() == $this->path_url;
    }
}
