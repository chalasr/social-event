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
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $jurys = User::where('role_id', '=', "2")->get();

        return View::make('admin/jurys/index', compact('jurys'));
    }

    /**
     * Display candidacies by category for each jury
     *
     * @return Response
     */
    public function getCandidates()
    {
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 2)
            return Redirect::to('users/register')->with('error', 'Vous devez être jury pour accéder à cette partie du site');

        $currentJury = User::find(Auth::user()->id);
        $juryCategories = $currentJury->categories()->get()->toArray();
        $categories = Jury::listCategories($currentJury);
        $candidates = User::where('role_id', '=', 1)
        ->whereHas('categories', function($q) use($juryCategories) {
            $q->where('name', '=', $juryCategories[0]['name']);
        });
        $categoriesNames = $juryCategories[0]['name'];
        for($i = 1; $i < count($juryCategories); ++$i) {
            $cat = $juryCategories[$i];
            $candidates->orWhereHas('categories', function($q) use($cat) {
                $q->where('name', '=', $cat['name']);
            });
            $categoriesNames .= ' - '.$cat['name'];
        }
        $candidates = $candidates->get();

        return View::make('jurys/index', compact('candidates', 'categories', 'categoriesNames'));
    }

    /**
     * Display candidacies by category for each jury
     *
     * @return Response
     */
    public function filterCandidates()
    {
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 2)
            return Redirect::to('users/register')->with('error', 'Vous devez être jury pour accéder à cette partie du site');
        if(!Input::get('filter_category') && !Input::get('username')){
            return Redirect::to('jury/candidates');
        }
        $currentJury = User::find(Auth::user()->id);
        $categories = Jury::listCategories($currentJury);
        $candidates = User::where('role_id', '=', 1);
        $juryCategories = $currentJury->categories()->get()->toArray();
        $categoriesNames = $juryCategories[0]['name'];
        if(!Input::get('filter_category')) {
            $candidates->whereHas('categories', function($q) use($juryCategories) {
                $q->where('name', '=', $juryCategories[0]['name']);
            });
            for($i = 1; $i < count($juryCategories); ++$i) {
                $cat = $juryCategories[$i];
                $candidates->orWhereHas('categories', function($q) use($cat) {
                    $q->where('name', '=', $cat['name']);
                });
                $categoriesNames .= ' - '.$cat['name'];
            }
        } else {
            $categoryName = Input::get('filter_category');
            $candidates->whereHas('categories', function($q) use($categoryName) {
                $q->where('name', '=', $categoryName);
            });
            $categoriesNames = "Catégorie ".$categoryName;
        }
        // if(Input::get('username')) {
        //     $enterpriseName = Input::get('username');
        //     $candidates->whereHas('enterprise', function($q) use($enterpriseName){
        //         $q->where('name', 'LIKE', '%'.$enterpriseName.'%');
        //     });
        // }
        $candidates = $candidates->get();

        return View::make('jurys/index', compact('candidates', 'categories', 'categoriesNames'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        return View::make('admin/jurys/new', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $validator = Validator::make(Input::all(), Jury::$rules);
        if($validator->passes())
        {
            $jury = new User;
            $jury->email = Input::get('email');
            $jury->password = Hash::make(Input::get('password'));
            $jury->society = Input::get('society');
            $jury->firstname = Input::get('firstname');
            $jury->lastname = Input::get('lastname');
            $jury->phone = Input::get('phone');
            $jury->city = Input::get('city');
            $categories = Category::all();
            $jury->role_id = 2;
            $jury->save();
            foreach($categories as $dbCategory) {
                if(Input::has($dbCategory->id)) {
                    $jury->categories()->attach($dbCategory);
                }
            }
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
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $categories = Category::all();
        $jury = User::find($id);
        $userCategories = $jury->categories()->get();
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
        return View::make('admin/jurys/edit', compact('jury', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

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
        if(Input::get('category') != null && Input::get('category') != ''){
            $dbCategory = Category::find(Input::get('category'));
            if(count($jury->categories()->get()) == 1){
                if($jury->categories()->first()->id != Input::get('category')){
                    $jury->categories()->delete();
                    $jury->categories()->attach($dbCategory);
                }
            }else{
              $jury->categories()->attach($dbCategory);
            }
        }
        return Redirect::to('/admin/jurys')->with('message', 'Le jury modifiée avec succès');

    }

    public function removeCategoryFrom($juryId, $categoryId)
    {
        if(!Auth::check()){
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        }
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $jury = User::find($juryId);
        $category = Category::find($categoryId);
        $jury->categories()->detach($category);

        return Redirect::to('admin/jurys/'.$juryId.'/edit')->with('message', 'Jury mis à jour avec succès');
    }

    public function addCategoryTo($juryId, $categoryId)
    {
        if(!Auth::check()){
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        }
        if(Auth::user()->role_id != 3)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $jury = User::find($juryId);
        $userCategories = $jury->categories()->get();
        $countUserCats = count($userCategories);
        $category = Category::find($categoryId);
        $jury->categories()->attach($category);

        return Redirect::to('admin/jurys/'.$juryId.'/edit')->with('message', 'Jury mis à jour avec succès');
    }
    /**
     *  Delete specified resource
     * @param  number $id The jury entity
     * @return HTTP 301 The redirection to index
     */
    public function getDelete($id)
    {
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être  administrateur pour accéder à cette partie du site');
        $jury = User::find($id);
        User::destroy($id);
        return Redirect::to('/admin/jurys/')->with('message', 'Jury supprimé avec succès');
    }

}
