<x-layout title="Temporadas de {{ $serie->nome }}">

    <x-link-button href="{{ route('series.index') }}" >Voltar</x-link-button>

    <ul class="list-group">
        @foreach ($serie->seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', [$serie->id, $season->id]) }}" class="m-0">{{ $season->number }}</a>
                <span class="badge bg-secondary">{{ count($season->episodes) }}</span>
            </li>
        @endforeach
    </ul>

</x-layout>