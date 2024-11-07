<h2>Detalhes</h2>
<h3>categoria-{{$categoria ->nome}}</h3>

<form action="{{ route('categorias.destroy',[ 'categoria'=> $categoria->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Delete</button>

</form>