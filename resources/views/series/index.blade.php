<x-layout title="Séries">
    <a class="btn btn-primary" href="/series/criar">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
</x-layout>
   
