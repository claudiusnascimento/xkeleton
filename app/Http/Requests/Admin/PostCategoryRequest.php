<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\XRequest;
use Illuminate\Validation\Rule;

class PostCategoryRequest extends XRequest
{

    protected $checkboxes = ['active'];

    protected $toaster_message = true;

    protected $slugs = [
        'slug' => 'name'
    ];

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
            'name' => 'required|string',
            'slug' => [
                'required',
                Rule::unique('post_categories')->ignore($this->getIgnoredId())
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'Nome não deve ser vazio',
            'slug.required' => 'Preencha o nome',
            'slug.unique' => 'Nome já existe'
        ];
    }
}
