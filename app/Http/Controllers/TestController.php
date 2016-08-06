<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\TestPage;
use App\Question;
use App\Answer;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;

class TestController extends Controller
{

  public function getAllTests(){
    $tests = Test::all();
    return view('tests.tests', ['tests' => $tests]);
  }
  public function getTest($test_id){
    $test = Test::findOrFail($test_id);
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::whereIn('page_id', $pages->pluck('id'))->get();
    return view('tests.test', ['test' => $test, 'pages' => $pages->count(), 'questions' => $questions->count()]);
  }
  public function getPrepareTest(Request $request, $test_id){
    if(Session::has('test_id')){
      Session::forget('test_id');
    }
    Session::put('test_id', $test_id);
    Session::put('question.answer', []);
    return Redirect::action('TestController@getStartTest', ['test_id' => $test_id, 'page_number' =>1]);
  }
  public function getStartTest($test_id, $page_number){
    $test = Test::findOrFail($test_id);
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::where('page_id', $pages[$page_number-1]->id)->get();
    // $answers = Answer::whereIn('question_id', $questions->pluck('id'))->question()->question_number;
    // $answers = Answer::whereIn('question_id', $questions->pluck('id'))->get()->groupBy('question_id');
    // $answers = Answer::whereIn('question_id', $questions->pluck('id'))->get()->groupBy('question_id');
    // $answers = Answer::all()->question()->where('page_id', $pages[$page_number-1]->id)->get();
    // foreach ($answers as $key => $value) {
    //     $answers[$key] = $value->shuffle()->implode('value', '|');
    // }
    $session_answers = Session::get('question.answer');

    // dd($answers);
    // dd($test);
    // dd($pages[$page_number-1]);
    // dd($questions);
    // dd($questions->pluck('question_number'));
    return view('tests.test-start', [
        'test' => $test,
        'page' => $pages[$page_number-1],
        'page_number' => $page_number,
        'page_count' => $pages->count(),
        'questions' => $questions,
        'session_answers' => $session_answers,
        ]);
  }
  public function postStoreAnswer(Request $request){
    $this->validate($request, [
      'answer' => 'required'
    ]);
    $question_id = $request['question_id'];
    $answer = $request['answer'];

    // $index = array_search($question_id, $selection = Session::get('question.answer', []));
    // if ($index !== false){
    //     // array_splice($selection, $index, 1);
    //     $selection[$index] = $answer;
    // }else{
    //     $selection[$question_id] = $answer;
    // }
    $selection = Session::get('question.answer', []);
    $selection[$question_id] = $answer;

    Session::set('question.answer', $selection);
    return response()->json(['test_id' => $request['test_id'], 'question_id' => $question_id, 'answer' => $answer, 'qas'=>$selection, 'index'=>$index], 200);
  }

  public function getStoreAnswer(Request $request){
    return Session::get('question.answer');
  }

}
