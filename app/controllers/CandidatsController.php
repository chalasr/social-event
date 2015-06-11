<?php

class CandidatsController extends BaseController
{
    public function getCompleteRegistration()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::findOrFail(Auth::user()->id);
        if($user->enterprise_id == 0)
            return View::make('enterprises.complete-inscription');
        else{
            $enterprise = Enterprise::find($user->enterprise_id);
            if($enterprise->registration_state == 'step2'){
                return Redirect::to('/register/complete/step2');
            }elseif($enterprise->registration_state == 'step3'){
              return Redirect::to('/register/complete/step3');
            }elseif($enterprise->registration_state == 'step4'){
              return Redirect::to('/register/complete/step4');
            }elseif($enterprise->registration_state == 'step5'){
              return Redirect::to('/register/complete/step5');
            }
        }
    }

    public function storeCompleteRegistration()
    {
        if (!Auth::check()){
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
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
            $enterprise->registration_state = 'step2';
            $enterprise->save();
            $user->enterprise_id = $enterprise->id;
            $user->save();
        } else {
            return Redirect::to('register/complete')->with('message', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }

    public function getCompleteRegistrationStep2()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::find(Auth::user()->id);
        if($user->enterprise_id == 0){
          return Redirect::to('/register/complete')->with('message', 'Vous devez avoir complété la première étape du formulaire pour accéder à celle ci');
        }
        // $categories = Category::findAll();

        return View::make('enterprises.complete-inscription-step2');
    }

    public function storeCompleteRegistrationStep2()
    {
        if (!Auth::check()){
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

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
