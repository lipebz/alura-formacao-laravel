<x-layout title="Cadastrar série">

    <x-link-button href="{{ route('series.index') }}" >Voltar</x-link-button>

    <x-form-errors />

    <form action="{{ route('series.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</x-layout>