<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Http\Requests;

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
  public function getStartTest($test_id){
    $test = Test::findOrFail($test_id);
    return view('tests.test-start', ['test' => $test]);
  }
}
