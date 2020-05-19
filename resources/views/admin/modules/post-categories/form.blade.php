
    {!! Form::xText('name', 'Nome') !!}

    {!! Form::xCheckbox('active', 'Ativo', 1, old('active', isset($model) ? optional($model->active) : true)) !!}


    {!! Form::xHtml('description', 'Descrição', $wildcard) !!}

    {!! Form::xSubmit() !!}
