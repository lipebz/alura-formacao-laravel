<x-layout title="Séries">

    <x-link-button href="{{ route('series.create') }}" >Adicionar</x-link-button>

    @isset($message)
        <x-message :type="$message['type']">{{ $message['text'] }}</x-message>
    @endisset

    <x-list :data="$series" value="nome" primary="id"/>

</x-layout>