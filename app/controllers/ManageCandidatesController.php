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
        $candidate = User::find($id);
        $survey = false;
        $activity = false;
        $enterprise = $candidate->enterprise()->first();
        if(!empty($enterprise->survey_id))
          $survey = Survey::findOrFail($enterprise->survey_id);
        if(!empty($enterprise->survey_id))
          $activity = Activity::find($enterprise->activity_id);
        return View::make('admin/candidates/show', compact('candidate', 'enterprise', 'survey', 'activity'));
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
