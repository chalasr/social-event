<?php

class ManageCandidatesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
          if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette         partie du site.');
          if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

          $candidates = User::where('role_id', '=', "1")->paginate(10);
          $categories = Category::lists('name', 'name');

          return View::make('admin/candidates/index', compact('candidates', 'categories'));
    }

    /**
     * Display filtered resources.
     *
     * @return Response
     */
    public function filterCandidates()
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette         partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

          if(Input::get('category_name') && Input::get('status')){
            $categoryName = Input::get('category_name');
            Input::get('status') == 'false' ? $status = 0 : $status = 1;
            $candidates = User::where('role_id', '=', 1)
            ->whereHas('categories', function($q) use($categoryName){
                $q->where('name', '=', $categoryName);
            })
            ->whereHas('enterprise', function($q) use($status){
                $q->where('is_valid', '=', $status);
            })
            ->paginate(10);
        }elseif(!Input::get('status') && Input::get('category_name')){
            $categoryName = Input::get('category_name');
            $candidates = User::where('role_id', '=', 1)
            ->whereHas('categories', function($q) use($categoryName){
                $q->where('name', '=', $categoryName);
            })->paginate(10);
        }elseif(!Input::get('category_name') && Input::get('status')){
            // print_r(Input::get('status'));die;
            Input::get('status') == 'false' ? $status = 0 : $status = 1;

            $candidates = User::where('role_id', '=', 1)
            ->whereHas('enterprise', function($q) use($status){
                $q->where('is_valid', '=', $status);
            })
            ->paginate(10);
        }else{
            $candidates = User::where('role_id', '=', "1")->paginate(10);
        }
        $categories = Category::lists('name', 'name');

        return View::make('admin/candidates/index', compact('candidates', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($id)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette         partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $candidate = User::find($id);
        $enterprise = $candidate->enterprise()->first();
        $survey = false;
        $activity = false;
        if(!empty($enterprise->survey_id))
          $survey = Survey::findOrFail($enterprise->survey_id);
        if(!empty($enterprise->survey_id))
          $activity = Activity::find($enterprise->activity_id);
        return View::make('admin/candidates/show', compact('candidate', 'enterprise', 'survey', 'activity'));
    }


    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function exportCandidate($id)
    {

        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette         partie du site.');
        if(Auth::user()->role_id != 3 && Auth::user()->role_id != 2){
            if(Auth::user()->id != $id) return Redirect::to('/')->with('error', 'Vous n\'avez pas accès aux autres dossiers candidats');
        }
        $candidate = User::find($id);
        $enterprise = $candidate->enterprise()->first();
        $survey = false;
        $activity = false;
        if(!empty($enterprise->survey_id))
          $survey = Survey::findOrFail($enterprise->survey_id);
        if(!empty($enterprise->survey_id))
          $activity = Activity::find($enterprise->activity_id);
        return View::make('admin/candidates/export', compact('candidate', 'enterprise', 'survey', 'activity'));
    }

    /**
     * Export candidate view from HTML to PDF using wkhtmltopdf
     * @param  is_integer $id the specified candidate
     * @return document     PDF view
     */
    public function htmlToPdf($id)
    {
        $request = Request::create('/candidate/export/'.$id, 'GET', array());
        $response = Route::dispatch($request);
        $status = $response->headers->get('location');
        $content = Route::dispatch($request)->getContent();

        if($status != NULL){
            return Redirect::to('/')->with('error', 'Vous n\'avez pas accès aux autres dossiers candidats');
        }

        $pdf = PDF::loadHTML($content);

        return $pdf->download('bref-candidature-'.$id.'.pdf');
    }

    public function getDownload($id)
    {
        $file = Upload::findOrFail($id);
        $filePath = public_path($file->path);
        $fileName = $file->name;
        $candidate = User::where('enterprise_id', $file->enterprise_id)->first();
        if(file_exists($filePath.DIRECTORY_SEPARATOR.$fileName)){
           return Response::download($filePath.DIRECTORY_SEPARATOR.$fileName);
        }else{
          return Redirect::to('admin/candidates/'.$candidate->id)->with('error', 'Le fichier demandé n\'existe plus');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $candidate = User::find($id);
        $userCategories = $candidate->categories;
        $countUserCats = count($userCategories);
        $categories = Category::all();
        $countCats = count($categories);
        foreach($userCategories as $userCat){
            for ($i=0; $i < $countCats; $i++) {
                if(isset($categories[$i])){
                    if($userCat->id == $categories[$i]->id){
                        unset($categories[$i]);
                    }
                }
            }
        }

        return View::make('admin/candidates/edit', compact('candidate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $candidat = User::find($id);
        if(!is_null($candidat->email)){
            $candidat->email = Input::get('email');
        }
        if(!is_null($candidat->password)){
            $candidat->password = Hash::make(Input::get('password'));
        }
        $candidat->save();
        return Redirect::to('/admin/candidates')->with('message', 'Candidat modifié avec succès');
    }

    public function updateCandidate()
    {
        if (!Auth::check()){
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce   formulaire');
        }

        return Redirect::to('admin/candidates')->with('message', 'Candidature mise à jour avec succès');
    }

    /**
     * Add a category to specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function removeCategoryFromCandidate($id, $categoryId)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $candidate = User::find($id);
        $category = Category::find($categoryId);
        $candidate->categories()->detach($category);

        return Redirect::to('/admin/candidates/'.$id.'/edit')->with('message', 'Candidature mise à jour avec succès');
    }

    /**
     * Remove a category to specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function addCategoryToCandidate($id, $categoryId)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $candidate = User::find($id);
        $userCategories = $candidate->categories()->get();
        $countUserCats = count($userCategories);
        if($countUserCats == 2){
            return Redirect::to('register/edit-complete/step2')->with('error', 'Vous pouvez sélectionner deux catégories au maximum par candidature');
        }

        $category = Category::find($categoryId);
        $candidate->categories()->attach($category);

        return Redirect::to('/admin/candidates/'.$id.'/edit')->with('message', 'Candidature mise à jour avec succès');
    }

    /**
     * Candidate validation by administrator
     * @return Redirection 301
     */
   public function validCandidate($id)
   {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $user = User::find($id);
        $enterprise = $user->enterprise()->first();

        if(!$enterprise){
            return Response::json('missing');
        }

        $enterprise->is_valid == 0 ? $enterprise->is_valid = 1 : $enterprise->is_valid = 0;
        $user->enterprise()->save($enterprise);

        return Response::json($enterprise->is_valid);

   }

    /**
     * Candidate payment validation by administrator
     * @return Redirection 301
     */
   public function validPayment($id)
   {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $user = User::find($id);
        $enterprise = $user->enterprise()->first();

        if(!$enterprise){
            return Response::json('missing');
        }
        if($enterprise->is_pay == 0){
            return Response::json('missing');
        }

        $enterprise->payment_status == 0 ? $enterprise->payment_status = 1 : $enterprise->payment_status = 0;
        $user->enterprise()->save($enterprise);

        return Response::json($enterprise->payment_status);

   }

    /**
     *  Delete specified resource
     * @param  number $id The candidat entity
     * @return HTTP 301 The redirection to index
     */
    public function getDelete($id)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être  administrateur pour accéder à cette partie du site');
        $candidat = User::find($id);
        User::destroy($id);
        return Redirect::to('/admin/candidates/')->with('message', 'Candidat supprimé avec succès');
    }

}
