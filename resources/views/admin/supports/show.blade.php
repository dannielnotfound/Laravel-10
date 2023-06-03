<h1>Detalhes da dúvida {{$support->id}} </h1>
<hr>
<ul>
    <li>Assunto: {{$support->subject}}</li>
    <li>Descrição: {{$support->body}}</li>
    <li>Status: {{$support->status}}</li>
</ul>

<a href="{{route('supports.index')}}">Voltar</a>