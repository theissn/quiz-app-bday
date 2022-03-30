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
        <h1 class="text-6xl">🎉🥳</h1>
        <p class="font-bold mt-8">{{ \App\Models\Participant::find(request()->session()->get('participant_id'))?->name }}</p>
    </div>
</body>

</html>