<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UploadWysiwygRequest extends FormRequest
{

    private $uploadDir = 'uploaddir';

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
            'images' => 'required|array',
            'images.*' => 'image|mimetypes:image/jpeg,image/png',
            $this->uploadDir => 'required|string',
        ];
    }

    public function messages() {
        return [
            'images.array' => 'Imagens não encontradas',
            'images.array' => 'Formato inválido de dados',
            'images.image' => 'Formato inválido das imagens',
            'images.mimetypes' => 'Só é possível salvar JPG e PNG',
            $this->uploadDir . '.required' => 'Diretório para salvar imagem inexistente',
            $this->uploadDir . '.string' => 'Diretório para salvar imagem inválido',
        ];
    }
}
