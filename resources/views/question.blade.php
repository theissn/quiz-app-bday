<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Quizr') . " Questions" }}</title>
</head>

<body class="antialiased flex justify-center w-full h-screen items-center">
    <div class="flex flex-col items-center max-w-[36rem] px-6 text-left mx-4 md:mx-auto">
        {{-- <h1 class="text-xl mb-6">{!! $question['q'] !!}</h1> --}}
        <h1 class="text-4xl font-bold mb-6">Spørgsmål {{ $questionID }}</h1>

        @forelse ($question['a'] as $key => $answer)
        <form class="w-full" action="{{ route('question') }}" method="post">
            @csrf
            <input type="hidden" name="answer" value="{{ $key }}">
            <button type="submit" class="bg-gray-200 text-left p-2 w-full my-2">{{ $key + 1 . ". " . $answer }}</button>
        </form>
        @empty
        <form class="w-full" action="{{ route('question') }}" method="post">
            @csrf
            <input class="border-2 w-full p-2" type="text" name="answer" placeholder="Skriv svart her">
            <button type="submit" class="bg-gray-200 text-left p-2 w-full my-2">Gem</button>
        </form>
        @endforelse
    </div>
</body>

</html>