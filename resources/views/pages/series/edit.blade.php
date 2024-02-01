<x-layout title="Editar série ({{ $serie->id }})">

    <x-link-button href="{{ route('series.index') }}" >Voltar</x-link-button>

    <form action="{{ route('series.edit', $serie->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $serie->nome }}">
        </div>
        <button type="submit" class="btn btn-success">Editar</button>
    </form>

</x-layout>