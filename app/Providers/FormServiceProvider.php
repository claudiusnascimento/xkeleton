<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $xTextView = 'components.admin.form.text';
        Form::component('xText', $xTextView, ['name', 'label' => null, 'value' => null, 'attributes' => []]);

        $xCheckbox = 'components.admin.form.checkbox';
        Form::component('xCheckbox', $xCheckbox, ['name', 'label' => 'Ativo', 'value' => 1, 'checked' => false]);

        $xSubmit = 'components.admin.form.submit';
        Form::component('xSubmit', $xSubmit, ['label' => 'Salvar', 'attributes' => []]);

        $xPassword = 'components.admin.form.password';
        Form::component('xPassword', $xPassword, ['name', 'label' => 'Senha', 'attributes' => []]);

        $xHtml = 'components.admin.form.html';
        Form::component('xHtml', $xHtml, ['name', 'label' => null, 'upload_dir' => '', 'value' => null,'attributes' => []]);

    }
}
