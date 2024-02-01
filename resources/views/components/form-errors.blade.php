@if($errors->any())
    @foreach ($errors->all() as $error)
        <x-message type="danger">{{ $error }}</x-message>
    @endforeach
@endif