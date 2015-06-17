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
        $newCategories = [];
        // print_r($categories);die;
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
        $validator = Validator::make(Input::all(), Jury::$rules);

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
