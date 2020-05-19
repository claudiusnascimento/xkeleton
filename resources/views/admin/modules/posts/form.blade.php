
<div class="row">

    <div class="col-md-9 col-sm-8">

        {!! Form::xText('title', 'Título') !!}

        {!! Form::xCheckbox('active', 'Ativo', 1, old('active', isset($model) ? optional($model->active) : true)) !!}


        {!! Form::xHtml('content', 'Conteúdo', $wildcard) !!}

        {!! Form::xSubmit() !!}

    </div>

    <div class="col-md-3 col-sm-4">
        <h4>Categorias</h4>
        <br>
        @foreach($categories as $category)

            {!! Form::xCheckbox('categories[]', $category->name, $category->id, null) !!}

        @endforeach

    </div>

</div>

