@component('mail::message')
# Introdução

Corpo da Mensagem.

@component('mail::button', ['url' => ''])
Botão
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
