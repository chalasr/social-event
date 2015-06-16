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
            return Redirect::to('register/complete')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
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
        $enterprise = $user->enterprise()->first();
        $enterprise->registration_state = 'step3';
        $user->enterprise()->save($enterprise);
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

        return View::make('enterprises.complete-inscription-step3');
    }

    /**
     *  Registration step 3 (candidate arguments)
     * @return redirect to next registration step
     */
    public function storeCompleteRegistrationStep3()
    {
        $user = User::find(Auth::user()->id);
        $enterprise = $user->enterprise()->first();

        $validator = Validator::make(Input::all(), Survey::$rules);
        if ($validator->passes()) {
            $survey = new Survey();
            $survey->enterprise_activity = Input::get('enterprise_activity');
            $survey->project_origin = Input::get('project_origin');
            $survey->innovative_arguments = Input::get('innovative_arguments');
            $survey->wanted_impact = Input::get('wanted_impact');
            $survey->product_informations = Input::get('product_informations');
            $survey->project_results = Input::get('project_results');
            $survey->project_rewards = Input::get('project_rewards');
            if(!empty(Input::get('project_partners')))
              $survey->project_partners = Input::get('project_partners');
            $survey->enterprise()->save($enterprise);
            $survey->save();
            $enterprise->registration_state = 'step4';
            $user->enterprise()->save($enterprise);

            return Redirect::to('/register/complete/step4');
        } else {
            return Redirect::to('register/complete/step3')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }
    /**
     *  Get registration step 4 template (Upload)
     * @return redirect to next register step
     */
    public function getCompleteRegistrationStep4()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

        return View::make('enterprises.complete-inscription-step4');
    }

    /**
     *  Handle Upload form
     * @return redirect to next register step
     */
    public function storeCompleteRegistrationStep4()
    {
        $files = Input::file('files');
        $file_count = count($files);
        $uploadcount = 0;

        foreach($files as $file)
        {
          $rules = array('file' => 'required');
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            $destinationPath = 'public/uploads/' . Auth::User()->id;
            $filename = $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);

            $file = new Upload;
            $file->name = $filename;
            $file->path = $destinationPath;
            $file->enterprise_id = Auth::User()->enterprise_id;
            $file->save();
            $uploadcount ++;
          }
        }
        if($uploadcount == $file_count){
          return Redirect::to('/register/complete/step4')->with('message', "Vos fichiers ont bien été uploadé");
        }
        else {
          return Redirect::to('/register/complete/step4')->withInput()->withErrors($validator);
        }
    }

}
