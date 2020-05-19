<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\XRequest;
use Illuminate\Validation\Rule;

class PageRequest extends XRequest
{
    protected $checkboxes = ['active'];

    protected $slugs = [
        'slug' => 'title'
    ];

    protected $toaster_message = true;

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
            'title' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                Rule::unique('pages')->ignore($this->getIgnoredId())
            ]
        ];

        return $rules;
    }

    public function messages() {
        return [
            'title.required' => 'O título é obrigatório',
            'title.string' => 'Título não deve ser vazio',
            'slug' => 'Preencha o título',
            'unique' => 'Título já existe'
        ];
    }

}
