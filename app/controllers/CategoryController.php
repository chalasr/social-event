<?php

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $categories = Category::all();
        return View::make('admin/category/category', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
         if(!Auth::check()) return Redirect::to('users/login')->with('error', 'Vous ne pouvez pas créer une catégorie sans être logger !');
            Return View::make('admin/category/new');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){
        $validator = Validator::make(Input::all(), Category::$rules);   
        if($validator->passes())
        {
            $add = new Category;
            $add->name = Input::get('name');
            $add->description = Input::get('description');
            $add->save();
            return Redirect::to('admin/category')->with('message', 'Votre catégorie est désormais en ligne !');
        }
        else
        {
            return Redirect::to('admin/category/new')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
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
        $category = Category::find($id);
        return View::make('admin/category/edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), Category::$rules);

        // process the login
        if ($validator->fails())
        {
            return Redirect::to('/admin/category/' . $id . '/edit')
                ->withErrors($validator);
        } 
        else 
        {
            // store
            $category = Category::find($id);
            $category->name       = Input::get('name');
            $category->description      = Input::get('description');
            $category->save();

            // redirect
            Session::flash('message', 'Modification effectué');
            return Redirect::to('/admin/category/');
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
        $category = Category::find($id);
        Category::destroy($id);
        return Redirect::to('/admin/category/')->with('message', 'La catégorie a bien été supprimé');
    }

}
