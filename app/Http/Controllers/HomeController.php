<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Test;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $tests = Test::orderBy('id', 'desc')->take(3)->get();
        return view('home', ['tests' => $tests]);
    }


}
