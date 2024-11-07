<a href="{{ route('cores.create') }}">Adicionar</a>
<hr>

<h2>Cores</h2>
<ul>
    @foreach($cores as $cor)
    <li>ID: {{$cor->id}} - Nome: {{$cor->nome}} |
        <a href="{{ route('cores.edit', ['cor' => $cor->id]) }}">Editar</a> |
        <a href="">Deletar</a> |
        <a href="{{ route('cores.show', ['cor' => $cor->id]) }}">Detalhes</a>
    </li>
    @endforeach
</ul>