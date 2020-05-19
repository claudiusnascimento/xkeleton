
    {!! Form::xText('title') !!}

    {!! Form::xText('subtitle') !!}

    {!! Form::xCheckbox('active', 1, 'Ativo', old('active', isset($model) ? optional($model->active) : true)) !!}

    {!! Form::xHtml('body', 'Conteúdo', $wildcard) !!}

    {!! Form::xSubmit() !!}
