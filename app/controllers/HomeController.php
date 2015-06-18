<?php

class HomeController extends BaseController
{
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
