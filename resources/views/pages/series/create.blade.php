<x-layout title="Cadastrar série">

    <x-link-button href="{{ route('series.index') }}" >Voltar</x-link-button>

    <x-form-errors />

    <form action="{{ route('series.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
            </div>
            <div class="col-md-2">
                <label for="seasonsQty" class="form-label">Qtd Temporadas</label>
                <input type="number" class="form-control" id="seasonsQty" name="seasonsQty" value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-md-2">
                <label for="episodesQty" class="form-label">Qtd Episódios</label>
                <input type="number" class="form-control" id="episodesQty" name="episodesQty" value="{{ old('episodesQty') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</x-layout>