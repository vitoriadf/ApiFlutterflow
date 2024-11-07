<h2>Detalhes</h2>
<h3>Marca - {{$marca->nome}}</h3>

<form action="{{ route('marcas.destroy', ['marca' => $marca->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar</button>
</form>