<?php

class CandidatsController extends BaseController
{
    public function getCompleteRegistration()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::findOrFail(Auth::user()->id);
        if(count($user->enterprise) == 0)
            return View::make('enterprises.complete-inscription');
        else{
            $enterprise = $user->enterprise()->first();
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
            $user->enterprise()->save($enterprise);
            $user->enterprise_id = $enterprise->id;
            $user->save();
            return Redirect::to('/register/complete/step2');
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
        $userCategories = User::find(Auth::user()->id)->categories()->get();
        if(count($user->enterprise) == 0){
            return Redirect::to('/register/complete');
        }
        if(count($userCategories) > 0){
          return Redirect::to('/register/complete/step3');
        }
        $categories = Category::all();

        return View::make('enterprises.complete-inscription-step2', compact('categories'));
    }

    public function storeCompleteRegistrationStep2()
    {
        $user = User::find(Auth::user()->id);
        $countCategories = count(Category::all());
        if (!Auth::check()){
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        for ($i=1; $i <= $countCategories; $i++) {
            $dbCategory = Category::find($i);
            if(Input::has($dbCategory->id)){
              $user->categories()->attach($dbCategory);
            }
        }
        $enterprise->registration_state = 'step2';
        return Redirect::to('/register/complete/step3');

    }

    public function getCompleteRegistrationStep3()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

        $user = User::find(Auth::user()->id);
        $userCategories = User::find(Auth::user()->id)->categories()->get();

        if(count($user->enterprise) == 0){
            return Redirect::to('/register/complete');
        }
        if(count($userCategories) == 0){
          return Redirect::to('/register/complete/step2');
        }

        if(!empty(Input::get('project_arguments')))
            $enterprise->project_arguments = Input::get('project_arguments');
        if(!empty(Input::get('project_results')))
            $enterprise->project_partners = Input::get('project_results');
        if(!empty(Input::get('project_partners')))
            $enterprise->project_partners = Input::get('project_partners');
        if(!empty(Input::get('project_rewards')))
            $enterprise->project_rewards = Input::get('project_rewards');

        // activity_id

        return View::make('enterprises.complete-inscription-step3',compact('user'));
    }

    /**
     *  Registration step 3 (candidate arguments)
     * @return redirect to next registration step
     */
    public function storeCompleteRegistrationStep3()
    {
        $user = User::find(Auth::user()->id);

        return Redirect::to('/register/complete/step3');
    }

    /*
      Upload
     */
    public function getCompleteRegistrationStep4()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

        return View::make('enterprises.complete-inscription-step4');
    }

    public function storeCompleteRegistrationStep4()
    {
        // UPLOAD
    }

}
