<x-layout title="Episódios">

    <x-link-button href="{{ route('series.index') }}" >Voltar</x-link-button>
    
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="m-0">{{ $episode->number }}</p>
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}">
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary my-3">Salvar</button>
    </form>

</x-layout>