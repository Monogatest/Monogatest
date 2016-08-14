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
use Auth;

class TestController extends Controller
{
  function initializeSession($test_id){
    Session::put('test_id', $test_id);
    Session::put('question.answer', []);
  }


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
    if(!Session::has('test_id')){
      $this->initializeSession($test_id);
    }else if(Session::get('test_id') != $test_id){
      $this->initializeSession($test_id);
    }
    return Redirect::action('TestController@getStartTest', ['test_id' => $test_id, 'page_number' =>1]);
  }
  public function getStartTest($test_id, $page_number){
    if(!Session::has('test_id')){
      Session::flash('abort', '<strong>This test was terminated or not started properly!</strong>');
      return Redirect::action('TestController@getTest', ['test_id' => $test_id]);
    }
    if(Session::get('test_id') != $test_id){
      Session::flash('abort', '<strong>Error: </strong><span lang="ja">' . Test::findOrFail(Session::get('test_id'))->title . '</span> is currently running');
      return Redirect::action('TestController@getTest', ['test_id' => $test_id]);
    }
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
    $question_count = Question::whereIn('page_id', $pages->pluck('id'))->get()->count();
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
        'question_count' => $question_count,
        ]);
  }
  public function postStoreAnswer(Request $request){
    $this->validate($request, [
      'answer' => 'required'
    ]);
    $question_number = $request['question_number'];
    $answer = $request['answer'];
    $beforeString = $request['beforeString'];
    $afterString = $request['afterString'];
    $selection = Session::get('question.answer', []);

    $compact_answer = array("beforeString" => $beforeString, "answer"=> $answer, "afterString" => $afterString);
    $selection[$question_number] = $compact_answer;

    Session::set('question.answer', $selection);
    return response()->json(['test_id' => $request['test_id'], 'question_number' => $question_number, 'answer' => $answer, 'qas'=>$selection], 200);
  }

  public function getStoreAnswer(Request $request){
    return Session::get('question.answer');
  }

  public function getTestReview(Request $request, $test_id){
    $test = Test::findOrFail($test_id);
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::whereIn('page_id', $pages->pluck('id'))->get();
    $session_answers = Session::get('question.answer');
    if(!Session::has('test_id')){
      Session::flash('abort', '<strong>This test was terminated or not started properly!</strong>');
      return Redirect::action('TestController@getTest', ['test_id' => $test_id]);
    }
    if($test_id != Session::get('test_id')){
      Session::flash('abort', '<strong>Error: </strong><span lang="ja">' . Test::findOrFail(Session::get('test_id'))->title . '</span> is currently running');
      return Redirect::action('TestController@getTest', ['test_id' => $test_id]);
    }
    if(count($session_answers) != $questions->count()){
      return Redirect::action('TestController@getStartTest', ['test_id' => $test_id, 'page_number' =>$pages->count()]);
    }

    return view('tests.test-review', [
        'test' => $test,
        'pages' => $pages,
        'questions' => $questions,
        'session_answers' => $session_answers,
        ]);
  }


  public function getTestResult(Request $request, $test_id){
    $test = Test::findOrFail($test_id);
    $pages = TestPage::where('test_id', $test_id)->get();
    $questions = Question::whereIn('page_id', $pages->pluck('id'))->get()->sortBy('question_number')->keyBy('question_number');
    $session_answers = Session::get('question.answer');
    if(!Session::has('test_id')){
      Session::flash('abort', '<strong>This test was terminated or not started properly!</strong>');
      return Redirect::action('TestController@getTest', ['test_id' => $test_id]);
    }
    if($test_id != Session::get('test_id')){
      Session::flash('abort', '<strong>Error: </strong><span lang="ja">' . Test::findOrFail(Session::get('test_id'))->title . '</span> is currently running');
      return Redirect::action('TestController@getTest', ['test_id' => $test_id]);
    }
    if(count($session_answers) != $questions->count()){
      return Redirect::action('TestController@getStartTest', ['test_id' => $test_id, 'page_number' =>$pages->count()]);
    }
    $user_answers = $session_answers;
    $mark = 0;
    $total = $questions->count();
    foreach($questions as $key => $question){
      foreach($question->answers as $answer){
        if($user_answers[$key]['answer'] == $answer->value){
          $user_answers[$key]['status'] = $answer->status == 1;
          if($user_answers[$key]['status']){
            $mark++;
          }
        }
      }
    }

    $last_score = null;
    if(Auth::check()){
      $current_user_tests = $test->test_users->where('id', Auth::user()->id);
      $last_id = 0;
      foreach($current_user_tests as $user){
        if($user->pivot->id > $last_id){
          $last_score = $user->pivot->score;
          $last_id = $user->pivot->id;
        }
      }
      Auth::user()->tests_taken()->save($test, ['score'=>$mark*100/$total]);
      $last_score = $current_user_tests->isEmpty() ? 'This is the first time you take this test' : 'Last time you have scored: <strong>' . $last_score . '%</strong> on this test';
    }


    Session::forget('question.answer');
    Session::forget('test_id');
    // dd($user_answers);
    return view('tests.test-result', [
        'test' => $test,
        'pages' => $pages,
        'questions' => $questions,
        'user_answers' => $user_answers,
        'mark' => $mark,
        'total' => $total,
        'last_score' => $last_score,
        ]);
  }



}
