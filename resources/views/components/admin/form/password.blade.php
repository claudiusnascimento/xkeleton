<div class="form-group">
    {{ Form::label($name, $label ?? ucfirst($name), ['class' => 'control-label']) }}
    {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}

    @if($errors->has($name))
        <div class="validator-error"><small>{{ $errors->get($name)[0] }}</small></div>
    @endif

</div>
