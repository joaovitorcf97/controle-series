<x-layout title="Séries">
    @auth
        <a class="btn btn-primary mb-2" href="{{ route('series.create') }}">Adicionar</a>
    @endauth
    
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{ $serie->nome }}
                @auth </a> @endauth
                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger bnt-sm">Deletar</button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
   
