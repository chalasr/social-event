<?php

class UsersController extends BaseController
{
    protected $layout = 'layouts.unlogged';

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('getDashboard')));
    }

    public function getRegister()
    {
        if (Auth::check()) {
            return Redirect::to('/')->with('message', 'Vous ne pouvez pas vous inscrire en étant déjà connecté');
        }
        return View::make('users.inscription');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {
            $user = new User();
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->save();

            if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
              return Redirect::to('/register/complete')->with('message', "Vous êtes désormais pré-inscris, afin de  terminer votre inscription, connectez vous grâce aux identifiants choisis lors de la première étape");
            }

        } else {
            return Redirect::to('users/register')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::to('/')->with('message', 'Vous êtes déjà connecté');
        }
        return View::make('users.login');
    }

    public function postSignin()
    {
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
            return Redirect::to('/')->with('message', 'Vous êtes connecté !');
        } else {
            return Redirect::to('users/register')
            ->with('error', 'Votre username/password est incorrect !')
            ->withInput();
        }
    }

    public function getDashboard()
    {
        return View::make('users.dashboard');
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/')->with('message', 'Vous êtes déconnecté !');
    }
}
