<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\XRequest;
use Illuminate\Validation\Rule;

class PostRequest extends XRequest
{

    protected $checkboxes = ['active'];

    protected $toaster_message = true;

    protected $slugs = [
        'slug' => 'title'
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
            'title' => 'required|string',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($this->getIgnoredId())
            ],
            'content' => 'required',
            'categories' => 'array|exists:post_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O nome é obrigatório',
            'title.string' => 'Nome não deve ser vazio',
            'slug.required' => 'Preencha o nome',
            'slug.unique' => 'Nome já existe',
            'content' => 'Preencha o conteúdo',
            'categories.array' => 'Categorias inválidas',
            'categories.exists' => 'Alguma categoria é inexistente'
        ];
    }
}
