<h2>Editar</h2>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<form action="{{ route('cores.update', $cor->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="nome" value="{{ $cor->nome }}">
    <button type="submit">Editar</button>
</form>