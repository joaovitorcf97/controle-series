<form action="{{ $action }}" method="post">
    @csrf
    @isset($nome)
        @method('PUT')
    @endisset
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input 
            class="form-control" 
            type="text" 
            id="nome" 
            name="nome"
            @isset($nome)value="{{ $nome }}"@endisset
        >
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>