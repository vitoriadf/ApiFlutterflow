<h2>Detalhes</h2>
<h3>Cor - {{$cor->nome}}</h3>

<form action="{{ route('cores.destroy', ['cor' => $cor->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar</button>
</form>