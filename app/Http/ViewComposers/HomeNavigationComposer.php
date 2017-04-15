<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class HomeNavigationComposer{
  public function compose(View $view){
    if(!Auth::check()){
      return;
    }

    $view->with('username', Auth::user()->username);
  }
}
 ?>
