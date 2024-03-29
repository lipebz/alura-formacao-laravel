<x-layout title="Episódios">

    <x-link-button href="{{ route('series.index') }}" >Voltar</x-link-button>

    @isset($message)
        <x-message :type="$message['type']">{{ $message['text'] }}</x-message>
    @endisset
    
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="m-0">{{ $episode->number }}</p>
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" @if($episode->watched == 1) checked @endif>
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary my-3">Salvar</button>
    </form>

</x-layout>