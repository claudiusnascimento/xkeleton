
<br>
@if($errors->has($name))
    <div class="validator-error"><small>{{ $errors->get($name)[0] }}</small></div>
@endif
<div class="form-group">
    {{ Form::label($name, $label ?? ucfirst($name), ['class' => 'control-label']) }}
    <br>
    {{ Form::textarea($name, $value, array_merge(['class' => 'html-editor', 'data-upload-dir' => $upload_dir ?? ""], $attributes)) }}

</div>
