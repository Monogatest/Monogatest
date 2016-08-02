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
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::whereIn('page_id', $pages->pluck('id'))->get();
    return view('tests.test', ['test' => $test, 'pages' => $pages->count(), 'questions' => $questions->count()]);
  }
  public function getPrepareTest(Request $request, $test_id){
    if($request->session()->has('test_id')){
      $request->session()->forget('test_id');
    }
    $request->session()->put('test_id', $test_id);
    $request->session()->put('question_answer', array());
    return Redirect::action('TestController@getStartTest', ['test_id' => $test_id, 'page_number' =>1]);
  }
  public function getStartTest($test_id, $page_number){
    $test = Test::findOrFail($test_id);
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::where('page_id', $pages[$page_number-1]->id)->get();
    $answers = Answer::whereIn('question_id', $questions->pluck('id'))->get()->groupBy('question_id');
    foreach ($answers as $key => $value) {
        $answers[$key] = $value->shuffle()->implode('value', '|');
    }

    // dd($test);
    // dd($pages[$page_number-1]);
    // dd($pages);
    // dd($questions);
    // dd($answers);
    return view('tests.test-start', [
        'test' => $test,
        'page' => $pages[$page_number-1],
        'page_number' => $page_number,
        'page_count' => $pages->count(),
        'questions' => $questions,
        'answers' => $answers
        ]);
  }
  public function postStoreAnswer(Request $request){
    $this->validate($request, [
      'answer' => 'required'
    ]);
    $qas = $request->session()->get('question_answer');

    foreach($qas as $qa){
      if($qa['quesion_id'] == $request['question_id']){
        $qa['answer'] = $request['answer'];
      }
    }
    $request->session()->set('question_answer', $qas);
    // $qas([$request['question_id'] => $request['answer']]);
    return response()->json(['test_id' => $request['test_id'], 'question_id' => $request['question_id'], 'answer' => $request['answer'], 'qas'=>$qas], 200);
  }

  public function getStoreAnswer(Request $request){
    return $request->session()->get('question_answer');
  }

}
