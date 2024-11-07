<h2>adicionar</h2>

@if(session()->has('message'))
        {{ session()->get('message') }}
  
@endif


<form action="{{ route('categorias.store') }}" method="post">
    @csrf
    <input type="text" name="nome">
    <button type="submit">adicionar</button>
</form>