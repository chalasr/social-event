<?php

class HomeController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showWelcome()
    {
        if(Auth::check()) {
            $user = User::findOrFail(Auth::user()->id);
            if($user->enterprise_id != 0){
              $enterprise = Enterprise::findOrFail($user->enterprise_id);

              return View::make('index', compact('enterprise'));
            }else{
              return View::make('index');
            }
        }else{
            return View::make('index');
        }
    }
}
