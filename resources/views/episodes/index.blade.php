<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form action="" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}
                   
                    <input 
                        type="checkbox" 
                        name="episodes[]" 
                        value="{{ $episode->id }}"
                        @if ($episode->watched)
                            @checked(true)
                        @endif
                    />
                </li>
            @endforeach
        </ul>
    
        <button class="btn btn-primary mt-2 mv-2">Salvar</button>
    </form>
</x-layout>
   
