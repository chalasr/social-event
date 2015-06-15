<?php

class CategoriesController extends BaseController
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
        $categories = Category::all();
        return View::make('admin/categories/index', compact('categories'));
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
        return View::make('admin/categories/new');
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
        $validator = Validator::make(Input::all(), Category::$rules);
        if($validator->passes())
        {
            $add = new Category;
            $add->name = Input::get('name');
            $add->description = Input::get('description');
            $add->save();
            return Redirect::to('admin/categories')->with('message', 'Votre catégorie est désormais en ligne !');
        }
        else
        {
            return Redirect::to('admin/categories/new')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $category = Category::find($id);
        return View::make('admin/categories/edit', compact('category'));
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
        $validator = Validator::make(Input::all(), Category::$rules);
        if ($validator->fails())
        {
            return Redirect::to('/admin/categories/' . $id . '/edit')
                ->withErrors($validator);
        }else{
            $category = Category::find($id);
            $category->description = Input::get('description');
            $category->name = Input::get('name');
            $category->save();

            return Redirect::to('/admin/categories/')->with('message', 'Categorie modifiée avec succès');
        }
    }

    public function getDelete($id)
    {
        $category = Category::find($id);
        Category::destroy($id);
        return Redirect::to('/admin/categories/')->with('message', 'La catégorie a bien été supprimé');
    }

}
