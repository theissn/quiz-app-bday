<?php

use App\Models\Answer;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $request->session()->forget(['question_id']);

    return view('welcome');
});

$question = function (Request $request) {
    $questions = json_decode(File::get(storage_path('app/questions.json')), true);

    if ($request->method() === 'POST') {
        $questionID = (int) $request->session()->get('question_id', 0);

        Answer::create([
            'participant_id' => $request->session()->get('participant_id'),
            'question_id' => $questionID,
            'answer' => $request->get('answer'),
        ]);

        $request->session()->put('question_id', $questionID + 1);
    }

    $questionID = $request->session()->get('question_id', 0);

    if (!array_key_exists($questionID, $questions)) {
        return redirect()->route('done');
    }

    return view('question', [
        'question' => $questions[$questionID],
    ]);
};


Route::post('/quiz', function (Request $request) {
    $p = Participant::create([
        'name' => str($request->get('name'))->replace(' ', '_') . "-" . uniqid(),
    ]);

    $request->session()->put('participant_id', $p->id);
    $request->session()->put('question_id', 0);

    return redirect()->route('question:get');
})->name('quiz');

Route::get('/question', $question)->name('question:get');
Route::post('/question', $question)->name('question');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function (Request $request) {
    if (!$request->session()->get('logged_in', false)) {
        return redirect()->route('login');
    }

    return view('dashboard', [
        'questions' => json_decode(File::get(storage_path('app/questions.json')), true)
    ]);
})->name('dashboard:view');

Route::post('/dashboard', function (Request $request) {
    if ($request->get('password') !== config('app.password')) {
        return redirect()->route('login');
    }

    $request->session()->put('logged_in', true);

    return redirect()->route('dashboard:view');
})->name('dashboard:auth');

Route::get('/done', function (Request $request) {
    return view('done');
})->name('done');
