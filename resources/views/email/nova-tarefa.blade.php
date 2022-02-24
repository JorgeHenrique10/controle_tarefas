@component('mail::message')

<h1>Olá {{$tarefa->usuario->name}}</h1>

<h3>{{$tarefa->tarefa}}</h1>

<p>Data Limite Conclusão da Tarefa é: {{$tarefa->data_limite_conclusao}}
</p>

@component('mail::button', ['url' => $url ])
Clique aqui para ver a tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent
