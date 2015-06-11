<?php

class JuryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $juries = User::where('role_id', '=', "2")->get();
        return View::make('admin/jury/jury', compact('juries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
         if(!Auth::check()) return Redirect::to('users/login')->with('error', 'Vous ne pouvez pas créer un compte jury sans être logger !');
            Return View::make('admin/jury/new');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){
        $validator = Validator::make(Input::all(), Jury::$rules);   
        if($validator->passes())
        {
            $add = new User;
            $add->username = Input::get('username');
            $add->email = Input::get('email');
            $add->password = Hash::make(Input::get('password'));
            $add->society = Input::get('society');
            $add->firstname = Input::get('firstname');
            $add->lastname = Input::get('lastname');
            $add->phone = Input::get('phone');
            $add->city = Input::get('city');
            $add->role_id = 2;
            $add->save();
            return Redirect::to('admin/jury')->with('message', 'La compte jury est désormais en ligne !');
        }
        else
        {
            return Redirect::to('admin/jury/create')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }
    /**
     * Display the specified re source.
     *
     * @param  int  $id
     * @return Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $jury = User::find($id);
        return View::make('admin/jury/edit', compact('jury'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), Jury::$rules);

        //process the login
        if ($validator->fails())
        {
            return Redirect::to('/admin/jury/' . $id . '/edit')
                ->withErrors($validator);
        } 
        else 
        {
            // store
            $jury = User::find($id);
            $jury->username = Input::get('username');
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

            // redirect
            Session::flash('message', 'Modification effectué');
            return Redirect::to('/admin/jury/');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDelete($id)
    {
        $jury = User::find($id);
        User::destroy($id);
        return Redirect::to('/admin/jury/')->with('message', 'La catégorie a bien été supprimé');
    }

}
