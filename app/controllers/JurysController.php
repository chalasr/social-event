<?php

class JurysController extends BaseController
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
        $jurys = User::where('role_id', '=', "2")->get();
        return View::make('admin/jurys/index', compact('jurys'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
         if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
            return View::make('admin/jurys/new');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $validator = Validator::make(Input::all(), Jury::$rules);
        if($validator->passes())
        {
            $add = new User;
            $add->email = Input::get('email');
            $add->password = Hash::make(Input::get('password'));
            $add->society = Input::get('society');
            $add->firstname = Input::get('firstname');
            $add->lastname = Input::get('lastname');
            $add->phone = Input::get('phone');
            $add->city = Input::get('city');
            $add->role_id = 2;
            $add->save();
            return Redirect::to('admin/jurys')->with('message', 'Le jury a été créé avec succès');
        }else{
            return Redirect::to('admin/jurys/create')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
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
        $jury = User::find($id);
        return View::make('admin/jurys/edit', compact('jury'));
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
            $jury = User::find($id);
            $jury->email = Input::get('email');
            if(!is_null($jury->password))
                $jury->password = Hash::make(Input::get('password'));
            $jury->society = Input::get('society');
            $jury->firstname = Input::get('firstname');
            $jury->lastname = Input::get('lastname');
            $jury->phone = Input::get('phone');
            $jury->city = Input::get('city');
            $jury->role_id = 2;
            $jury->save();
        }else{
            return Redirect::to('/admin/jurys/' . $id . '/edit')
                ->withErrors($validator)->withInput();
            return Redirect::to('/admin/jurys/')->with('message', 'Catégorie modifiée avec succès');
        }
    }

    /**
     *  Delete specified resource
     * @param  number $id The jury entity
     * @return HTTP 301 The redirection to index
     */
    public function getDelete($id)
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être  administrateur pour accéder à cette partie du site');
        $jury = User::find($id);
        User::destroy($id);
        return Redirect::to('/admin/jurys/')->with('message', 'Catégorie supprimée avec succès');
    }

}
