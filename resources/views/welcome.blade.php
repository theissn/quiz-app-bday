<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Quizr') }}</title>
</head>

<body class="antialiased flex justify-center w-full h-screen items-center">
    <div class="flex flex-col items-center w-96 text-center mx-auto">
        <h1 class="text-4xl mb-8">Freddys fede årtier</h1>
        <form action="{{ route('quiz') }}" method="POST">
            @csrf
            <input class="w-full my-2 border-2 text-xl py-2 px-2" type="text" placeholder="Skriv Navn" name="name" required>
            <button type="submit" class="bg-gray-200 text-xl p-2 w-full my-2">Start</button>
        </form>
    </div>
</body>

</html>