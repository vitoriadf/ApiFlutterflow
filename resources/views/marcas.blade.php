<a href="{{ route('marcas.create') }}">Adicionar</a>
<hr>

<h2>Marcas</h2>
<ul>
    @foreach($marcas as $marca)
    <li>ID: {{$marca->id}} - Nome: {{$marca->nome}} |
        <a href="{{ route('marcas.edit', ['marca' => $marca->id]) }}">Editar</a> |
        <a href="">Deletar</a> |
        <a href="{{ route('marcas.show', ['marca' => $marca->id]) }}">Detalhes</a>
    </li>
    @endforeach
</ul>
