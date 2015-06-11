<?php

class CandidatsController extends BaseController
{
    public function getCompleteRegistration()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
         return View::make('users.complete-inscription');
    }

    public function getCompleteRegistrationStep2()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
         return View::make('users.complete-inscription-step2');
    }

    public function storeCompleteRegistration()
    {
        if (!Auth::check())
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');

        $user = User::find(Auth::user()->id);
        $validator = Validator::make(Input::all(), Enterprise::$rules);
        if ($validator->passes()) {
            $enterprise = new Enterprise();
            $enterprise->name = Input::get('name');
            $enterprise->juridical_status = Input::get('juridical_status');
            $enterprise->creation_date = Input::get('creation_date');
            if(Input::get('member_of_group') != null && Input::get('member_of_group') != '')
              $enterprise->member_of_group = Input::get('member_of_group');
            $enterprise->postal_address = Input::get('postal_address');
            $enterprise->phone = Input::get('phone');
            if(Input::get('telecopie') != null && Input::get('telecopie') != '')
              $enterprise->telecopie = Input::get('telecopie');
            $enterprise->leaders_informations = Input::get('leaders_informations');
            $enterprise->candidate_informations = Input::get('candidate_informations');
            $enterprise->candidate_phone = Input::get('candidate_phone');
            $enterprise->candidate_email = Input::get('candidate_email');
            $enterprise->save();
            $user->enterprise_id = $enterprise->id;
            $user->save();
        } else {
            return Redirect::to('register/complete')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }
}
