<x-layout title="Séries">

    <x-link-button href="{{ route('series.create') }}" >Adicionar</x-link-button>

    <x-list :data="$series" value="nome" />

</x-layout>