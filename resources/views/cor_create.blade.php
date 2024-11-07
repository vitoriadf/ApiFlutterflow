<h2>Adicionar</h2>

@if(session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('cores.store') }}" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome da Cor">
    <button type="submit">Adicionar</button>
</form>