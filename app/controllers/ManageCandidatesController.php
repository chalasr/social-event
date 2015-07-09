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
          $candidates = User::where('role_id', '=', "1")->get();

          return View::make('admin/candidates/index', compact('candidates'));
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

        return $pdf->stream('bref-candidature-'.$id.'.pdf');
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
      * Candidate validation by administrator
      * @return Redirection 301
      */
    // public function valideCandidate()
    // {
    //     if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
    //     if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
    //
    //     $user = User::find(Auth::user()->id);
    //     $enterprise = $user->enterprise()->first();
    //
    //     $enterprise->is_valid = 1;
    //     $enterprise->save();
    //
    //     return new Response::json('success');
    //
    // }

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
        return Redirect::to('/admin/candidates/')->with('message', 'Candidat supprimée avec succès');
    }

}
