<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TestResult extends Model
{
    use HasFactory;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function test_result_answers()
    {
        return $this->hasMany(TestResultAnswer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calculateCorrectAnswers() : int
    {
        $result = 0;

        foreach ($this->test_result_answers as $answer) {

            $questionAnswer = Test_question_answer::findorFail($answer->test_question_answer_id);
            if ($questionAnswer->is_correct) {
                 $result++;
           }else {
               //$result--;
            }

        }

        if ($result < 0) $result = 0;

        return $result;

    }


    public static function ofTestAndUserCalculated(int $testId, int $userId)
    {
        $results = [];

        $list = static::where('test_id', '=', $testId)
                    ->where('user_id', '=', $userId)
                    ->with('test_result_answers', 'test', 'test.test_questions')
                    ->get();

        foreach ($list as $result) {
            $test = $result->test;
            $test->loadCount('test_questions');

            $correctAnswers = $result->calculateCorrectAnswers();
            $total = $test->test_questions_count;
            $correctAnswers = $correctAnswers;
            $correctPercentage = round(($correctAnswers / $total * 100), 2);

            $results[] = compact('total', 'correctAnswers', 'correctPercentage');

        }

        return $results;

    }

}
