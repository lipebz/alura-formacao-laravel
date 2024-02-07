<x-layout title="Login">

    <x-form-errors />

    <form action="{{ route('login.signIn') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="row">
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('login.register') }}" class="btn btn-dark">Registrar</a>
            </div>
        </div>
    </form>

</x-layout>