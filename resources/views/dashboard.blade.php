<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Quizr') }}</title>
</head>

<body class="antialiased">
    <div class="bg-slate-50">
        <table class=" w-full table-auto">
            <thead>
                <th>Participant</th>
                @foreach($questions as $k => $q)
                <th class="hidden md:inline-block w-24 text-right">{{ $k }}</th>
                @endforeach
                <th>Correct</th>
            </thead>
            <tbody class="bg-white">
                @foreach(\App\Models\Participant::all()->sortByDesc('correct') as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    @foreach($p->answers as $a)
                    <td class="hidden md:inline-block w-24 text-right">{{ $a->answer }}</td>
                    @endforeach

                    <td>{{ $p->correct }} / 10</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>