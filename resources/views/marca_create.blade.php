<h2>Adicionar</h2>

@if(session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('marcas.store') }}" method="post">
    @csrf
    <input type="text" name="nome">
    <button type="submit">Adicionar</button>
</form>