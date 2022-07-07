<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Test_question;
use App\Models\Test_question_answer;
use App\Models\TestResult;
use App\Models\TestResultAnswer;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Inertia\Inertia;


class TestsController extends Controller
{


    public function getTests()
    {
        return Test::all();
    }

    public function addTest(Request $request)
    {
        $data =  $request -> all();
        $test = Test::create($data);
        return Test::all();
    }


    public function addQuiz(Request $request)
    {
        $data = $request['test_question'];
        $data1 = $request['answer1'];
        $data2 = $request['answer2'];
        $data3 = $request['answer3'];
        $data4 = $request['answer4'];

        $test_question = Test_question::create((array)$data);

        $data1['test_question_id'] = $test_question['id'];
        $data2['test_question_id'] = $test_question['id'];
        $data3['test_question_id'] = $test_question['id'];
        $data4['test_question_id'] = $test_question['id'];

        $answer1 = Test_question_answer::create((array)$data1);
        $answer2 = Test_question_answer::create((array)$data2);
        $answer3 = Test_question_answer::create((array)$data3);
        $answer4 = Test_question_answer::create((array)$data4);

        return compact('test_question','answer1', 'answer2', 'answer3','answer4');
    }

      public function index(int $testId)
    {
        $test = Test::whereId($testId)
            ->with('test_questions', 'test_questions.test_question_answers')
            ->firstOrFail();
        return Inertia::render('TestQuestions', compact('test'));
    }

     public function setResult(int $testId)
    {
        $test = Test::findorFail($testId);


        $answers = request()->answers;

        $result = new TestResult;
        $result->test_id = $testId;
        $result->user_id = Auth::user()->id;
        $result->save();

        $correctAnswers = 0;

        foreach ($answers as $answerId => $value) {

            // skip not picked answers
            if ($value == false)
                continue;

            $questionAnswer = Test_question_answer::findorFail($answerId);
            if ($questionAnswer->is_correct) $correctAnswers++;


            $resultAnswer = new TestResultAnswer;
            $resultAnswer->test_result_id = $result->id;
            $resultAnswer->test_question_answer_id = $answerId;
            $resultAnswer->save();

        }



        // calculate correctPercentage
        $test->loadCount('test_questions');
        $total = $test->test_questions_count;

        $correctPercentage = round(($correctAnswers / $total * 100), 2);

        return compact('correctAnswers', 'correctPercentage');
    }

}
