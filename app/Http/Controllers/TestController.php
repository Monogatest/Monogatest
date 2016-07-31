<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\TestPage;
use App\Question;
use App\Answer;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class TestController extends Controller
{

  public function getAllTests(){
    $tests = Test::all();
    return view('tests.tests', ['tests' => $tests]);
  }
  public function getTest($test_id){
    $test = Test::findOrFail($test_id);
    return view('tests.test', ['test' => $test]);
  }
  public function getPrepareTest($test_id){
    return Redirect::action('TestController@getStartTest', ['test_id' => $test_id, 'page_number' =>1]);
  }
  public function getStartTest($test_id, $page_number){
    $test = Test::findOrFail($test_id);
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::where('page_id', $pages[$page_number-1]->id)->get();
    $answers = Answer::whereIn('question_id', $questions->pluck('id'))->get()->groupBy('question_id');
    foreach ($answers as $key => $value) {
        $answers[$key] = $answers[$key]->shuffle()->implode('value', '|');
    }
    return view('tests.test-start', [
        'test' => $test,
        'page' => $pages[$page_number-1],
        'page_number' => $page_number,
        'page_count' => $pages->count(),
        'questions' => $questions,
        'answers' => $answers
        ]);
  }
}
