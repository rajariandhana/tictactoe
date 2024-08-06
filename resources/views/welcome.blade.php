<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    hello world
    @foreach ($games as $game)
        <ul>
            <li>id {{ $game->id }}</li>
            <li>pass {{ $game->pass }}</li>
            <li>p1 {{ $game->player1->id }} {{ $game->player1->name }}</li>
            <li>p2 {{ $game->player2->id }} {{ $game->player2->name }}</li>
        </ul>
    @endforeach

    @livewire('board')

    @livewireScripts
</body>

</html>
