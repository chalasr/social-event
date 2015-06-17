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
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
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
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
            $candidate = User::find($id);
            return View::make('admin/candidates/show', compact('candidate'));
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
        $validator = Validator::make(Input::all(), User::$rules);

        if($validator->passes()){
            $candidat = User::find($id);
            $candidat->email = Input::get('email');
            if(!is_null($candidat->password)){
                $candidat->password = Hash::make(Input::get('password'));
            }
            return Redirect::to('/admin/candidates')->with('message', 'Candidat modifié avec succès');
        }else{
            return Redirect::to('/admin/candidates/' . $id . '/edit')->withErrors($validator)->withInput();
        }
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
