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
        <form action="{{ route('dashboard:auth') }}" method="POST">
            @csrf
            <input class="w-full my-2 border-2 text-xl py-2 px-2" type="text" placeholder="Password" name="password">
            <input type="submit" class="w-full bg-gray-200 text-xl py-2" placeholder="Start" />
        </form>
    </div>
</body>

</html>