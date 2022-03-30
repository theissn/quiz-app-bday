<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['correct'];

    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('question_id');
    }

    public function getCorrectAttribute()
    {
        $correct = 0;

        $questions = json_decode(File::get(storage_path('app/questions.json')), true);

        foreach ($this->answers as $answer) {
            if ($questions[$answer->question_id]['c'] != (int) $answer->answer) {
                continue;
            }

            $correct++;
        }

        return $correct;
    }
}
