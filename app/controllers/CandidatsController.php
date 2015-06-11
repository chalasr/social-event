<?php

class CandidatsController extends BaseController
{
    public function getCompleteRegistration()
    {
        if (!Auth::check()) {
            return Redirect::to('/')->with('message', 'Vous devez vous pré-inscrire et être connecté pour remplir ce formulaire');
        }
         return View::make('users.complete-inscription');
    }

    public function postCompleteRegistration()
    {
        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {
            $user = new User();
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->save();

            if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
              return Redirect::to('/')->with('message', "Vous êtes désormais pré-inscris, afin de compléter votre inscription, veuillez remplir le formulaire ci-dessous");
            }

        } else {
            return Redirect::to('users/register')->with('message', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }
}
