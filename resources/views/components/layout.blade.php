<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <main class="container p-5">

        <h1 class="mb-5">{{ $title }}</h1>
        
        {{ $slot }}
        
    </main>

</body>
</html>