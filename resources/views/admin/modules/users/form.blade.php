
    {!! Form::xText('name') !!}

    {!! Form::xText('email') !!}

    {!! Form::xCheckbox('active', 1, 'Ativo', old('active', isset($model) ? optional($model->active) : true)) !!}

    @if(!isset($model))
        <br>
        {!! Form::xPassword('password') !!}
        {!! Form::xPassword('password_confirmation') !!}

    @endif


    {!! Form::xSubmit() !!}
