

<h2>editar</h2>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<form action="{{ route('categorias.update', $categoria->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="nome" value="{{ $categoria->nome }}">
    <button type="submit">Editar</button>
</form>



