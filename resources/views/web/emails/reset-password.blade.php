@component('mail::message')
# Recuperação de Senha

Olá {{ $userName }}, enviamos esse e-mail para auxilia-lo na recuperação da sua senha.

###### Se você não requisitou uma recuperação de senha, apenas ignore este e-mail.

@component('mail::button', ['url' => route('web.password.new', $token)])
Clique aqui para recuperar sua senha
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
