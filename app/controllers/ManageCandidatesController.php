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

          $candidates = User::where('role_id', '=', "1")->orderBy('created_at', 'desc')->paginate(10);
          $count = count(User::where('role_id', '=', "1")->get());
          $categories = Category::lists('name', 'name');
          $pagination = true;
          $title = '';

          return View::make('admin/candidates/index', compact('candidates', 'categories', 'pagination', 'title', 'count'));
    }

    public function getCandidatesCount(){
        $candidates = Enterprise::where('is_valid', '=', 1)->get();
        return View::make('admin/candidates/brut', compact('candidates'));
    }

    /**
     * Display filtered resources.
     *
     * @return Response
     */
    public function filterCandidates()
    {
        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id != 3) return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');

        $title = '';
        $candidates = User::where('role_id', '=', 1);

        if(Input::get('category_name')) {
            $categoryName = Input::get('category_name');
            $candidates->whereHas('categories', function($q) use($categoryName){
                $q->where('name', '=', $categoryName);
            });
            $title = "- Catégorie ".$categoryName;
        }
        if(Input::get('status')) {
            Input::get('status') == 'false' ? $status = 0 : $status = 1;
            $candidates->whereHas('enterprise', function($q) use($status){
                $q->where('is_valid', '=', $status);
            });
            $title .= $status == 1 ? " - Validés" : " - Non validés";
        }
        if(Input::get('paymentStatus')) {
            Input::get('paymentStatus') == 'false' ? $payStatus = 0 : $payStatus = 1;
            $candidates->whereHas('enterprise', function($q) use($payStatus){
                $q->where('payment_status', '=', $payStatus);
            });
            $title .= $payStatus == 1 ? " - Paiements reçus" : " - Paiements non reçus";
        }
        if(Input::get('paymentMode')) {
            $payMode = intval(Input::get('paymentMode'));
            $candidates->whereHas('enterprise', function($q) use($payMode){
                $q->where('is_pay', '=', $payMode);
            });
            $payMode = $payMode == 1 ? 'Paypal' : 'chèque';
            $title .= " - Payé par ".$payMode;
        }
        if(Input::get('username')) {
            $enterpriseName = Input::get('username');
            $candidates->whereHas('enterprise', function($q) use($enterpriseName){
                $q->where('name', 'LIKE', '%'.$enterpriseName.'%');
            });
        }

        $candidates = $candidates->get();
        $count = count($candidates);
        $categories = Category::lists('name', 'name');
        $pagination = false;

        return View::make('admin/candidates/index', compact('candidates', 'categories', 'pagination', 'title', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($id)
    {
        if(!Auth::check())
            return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
        if(Auth::user()->role_id < 2)
            return Redirect::to('users/register')->with('error', 'Vous devez être administrateur pour accéder à cette partie du site');
        $candidate = User::find($id);
        $candidate ? $enterprise = $candidate->enterprise()->first() : $enterprise = false;
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

        if(!Auth::check()) return Redirect::to('users/register')->with('error', 'Vous devez être inscrit pour accéder à cette partie du site.');
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
        $candidate = User::find($id);
        $request = Request::create('/candidate/export/'.$id, 'GET', array());
        $response = Route::dispatch($request);
        $status = $response->headers->get('location');
        $content = Route::dispatch($request)->getContent();

        if($status != NULL){
            return Redirect::to('/')->with('error', 'Vous n\'avez pas accès aux autres dossiers candidats');
        }
        $pdf = PDF::loadHTML($content);

        if($candidate->enterprise()->first()){
            $enterpriseName = $candidate->enterprise()->first()->name;
            return $pdf->download('bref-candidature-'.$enterpriseName.'.pdf');
        }
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

        if(!$enterprise || $enterprise->is_pay == 0){
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
