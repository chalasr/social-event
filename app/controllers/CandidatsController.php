<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class CandidatsController extends BaseController
{
    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function getCompleteRegistration()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::findOrFail(Auth::user()->id);
        if(count($user->enterprise()->first()) == 0)
            return View::make('enterprises.complete-inscription');
        else{
            $enterprise = $user->enterprise()->first();
            if($enterprise->registration_state == 'step2'){
                return Redirect::to('/register/complete/step2');
            }elseif($enterprise->registration_state == 'step3'){
              return Redirect::to('/register/complete/step3');
            }elseif($enterprise->registration_state == 'step4'){
              return Redirect::to('/register/complete/step4');
            }elseif($enterprise->registration_state == 'step5'){
              return Redirect::to('/register/complete/step5');
            }elseif($enterprise->registration_state == 'final'){
              return Redirect::to('/register/complete/final');
            }
        }
    }

    public function storeCompleteRegistration()
    {
        if (!Auth::check()){
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::find(Auth::user()->id);
        $validator = Validator::make(Input::all(), Enterprise::$rules);
        if ($validator->passes()) {
            $enterprise = new Enterprise();
            $enterprise->name = Input::get('name');
            $enterprise->juridical_status = Input::get('juridical_status');
            $enterprise->creation_date = Input::get('creation_date');
            if(Input::get('member_of_group') != null && Input::get('member_of_group') != '')
              $enterprise->member_of_group = Input::get('member_of_group');
            $enterprise->postal_address = Input::get('postal_address');
            $enterprise->phone = Input::get('phone');
            if(Input::get('telecopie') != null && Input::get('telecopie') != '')
              $enterprise->telecopie = Input::get('telecopie');
            $enterprise->leaders_informations = Input::get('leaders_informations');
            $enterprise->candidate_informations = Input::get('candidate_informations');
            $enterprise->candidate_phone = Input::get('candidate_phone');
            $enterprise->candidate_email = Input::get('candidate_email');
            $enterprise->registration_state = 'step2';
            $user->enterprise()->save($enterprise);
            $user->enterprise_id = $enterprise->id;
            $user->save();

            return Redirect::to('/register/complete/step2');
        } else {

            return Redirect::to('register/complete')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }

    public function getCompleteRegistrationStep2()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::find(Auth::user()->id);
        $userCategories = User::find(Auth::user()->id)->categories()->get();
        if(count($user->enterprise()->first()) == 0){
            return Redirect::to('/register/complete');
        }
        if(count($userCategories) > 0){
          return Redirect::to('/register/complete/step3');
        }
        $categories = Category::all();

        return View::make('enterprises.complete-inscription-step2', compact('categories'));
    }

    public function storeCompleteRegistrationStep2()
    {
        if (!Auth::check()){
          return Redirect::to('/')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::find(Auth::user()->id);
        $countCategories = count(Category::all());
        for ($i=1; $i <= $countCategories; $i++) {
            $dbCategory = Category::find($i);
            if(Input::has($dbCategory->id)){
              $user->categories()->attach($dbCategory);
            }
        }
        $enterprise = $user->enterprise()->first();
        $enterprise->registration_state = 'step3';
        $user->enterprise()->save($enterprise);

        return Redirect::to('/register/complete/step3');
    }

    public function getCompleteRegistrationStep3()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

        $user = User::find(Auth::user()->id);
        $userCategories = User::find(Auth::user()->id)->categories()->get();
        $userEnterprise = $user->enterprise()->first();
        $userSurvey = $userEnterprise->survey_id;
        $userFiles = $userEnterprise->files()->first();
        if(count($user->enterprise()->first()) == 0){
            return Redirect::to('/register/complete');
        }
        if(count($userCategories) == 0){
          return Redirect::to('/register/complete/step2');
        }
        if(!empty($userSurvey)){
          return Redirect::to('/register/complete/step4');
        }

        return View::make('enterprises.complete-inscription-step3');
    }

    /**
     *  Registration step 3 (candidate arguments)
     * @return redirect to next registration step
     */
    public function storeCompleteRegistrationStep3()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::find(Auth::user()->id);
        $enterprise = $user->enterprise()->first();

        $validator = Validator::make(Input::all(), Survey::$rules);
        if ($validator->passes()) {
            $survey = new Survey();
            $survey->enterprise_activity = Input::get('enterprise_activity');
            $survey->project_origin = Input::get('project_origin');
            $survey->innovative_arguments = Input::get('innovative_arguments');
            $survey->wanted_impact = Input::get('wanted_impact');
            $survey->product_informations = Input::get('product_informations');
            $survey->project_results = Input::get('project_results');
            $survey->project_rewards = Input::get('project_rewards');
            $survey->project_partners = Input::get('project_partners');
            $files = Input::file('files');
            if(count($files) >= 1){
              foreach($files as $file){
                  $rules = array('file' => 'required');
                  $destinationPath = 'public/uploads/' . Auth::User()->id;
                  $filename = $file->getClientOriginalName();
                  $upload_success = $file->move($destinationPath, $filename);

                  $file = new Upload;
                  $file->name = $filename;
                  $file->path = $destinationPath;
                  $file->enterprise_id = $enterprise->id;
                  $file->save();
              }
            }
            $survey->save();
            $survey->enterprise()->save($enterprise);
            $enterprise->registration_state = 'step4';
            $user->enterprise()->save($enterprise);


            return Redirect::to('/register/complete/step4');
        } else {
            return Redirect::to('register/complete/step3')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }
    /**
     *  Get registration step 4 template (Upload)
     * @return redirect to next register step
     */
    public function getCompleteRegistrationStep4()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

        return View::make('enterprises.complete-inscription-step4');
    }

    /**
     *  Handle Upload form
     * @return redirect to next register step
     */
    public function storeCompleteRegistrationStep4()
    {
        if (!Auth::check()) {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }

        $user = User::find(Auth::user()->id);
        $enterprise = $user->enterprise()->first();

        if(Input::get('external_collaborators_type') != null && Input::get('external_collaborators_type') != '')
          $enterprise->external_collaborators_type = Input::get('external_collaborators_type');
        if(Input::get('internal_collaborators') != null && Input::get('internal_collaborators' != ''))
          $enterprise->internal_collaborators = Input::get('internal_collaborators');
        if(Input::get('project_certificates') != null &&  Input::get('project_certificates') != '')
          $enterprise->project_certificates = Input::get('project_certificates');
        $enterprise->registration_state = 'step5';
        $user->enterprise()->save($enterprise);

        $validator = Validator::make(Input::all(), Activity::$rules);
        if ($validator->passes()) {
            $activity = new Activity();
            $activity->ca_2013 = Input::get('ca_2013');
            $activity->effectif_2013 = Input::get('effectif_2013');
            $activity->net_2013 = Input::get('net_2013');
            $activity->rd_2013 = Input::get('rd_2013');
            $activity->effectif_rd_2013 = Input::get('effectif_rd_2013');
            $activity->ca_2014 = Input::get('ca_2014');
            $activity->effectif_2014 = Input::get('effectif_2014');
            $activity->net_2014 = Input::get('net_2014');
            $activity->rd_2014 = Input::get('rd_2014');
            $activity->effectif_rd_2014 = Input::get('effectif_rd_2014');
            $activity->ca_2015 = Input::get('ca_2015');
            $activity->effectif_2015 = Input::get('effectif_2015');
            $activity->net_2015 = Input::get('net_2015');
            $activity->rd_2015 = Input::get('rd_2015');
            $activity->effectif_rd_2015 = Input::get('effectif_rd_2015');
            $activity->enterprise_id = $enterprise->id;
            $activity->save();
            $activity->enterprise()->save($enterprise);
            return Redirect::to('/register/complete/step5');
        } else {
            return Redirect::to('register/complete/step4')->with('error', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
        }
    }

    public function storeCompleteRegistrationStep5()
    {
        $user = User::find(Auth::user()->id);
        $enterprise = $user->enterprise()->first();

        if($enterprise->is_pay >= 1)
        {
            return Redirect::action('CandidatsController@getCompleteRegistrationFinal')->with('message', 'Vous avez déjà effectué le payment');
        }
        else
        {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();
            $item_1->setName('Ticket de participation Bref Rhônes-Alpes')
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice('100');

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('EUR')
                ->setTotal(100);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('payment.status'))
                ->setCancelUrl(URL::route('payment.status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    die('Some error occur, sorry for inconvenient');
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            Session::put('paypal_payment_id', $payment->getId());

            if(isset($redirect_url)) {
                return Redirect::away($redirect_url);
            }

            return Redirect::action('CandidatsController@getCompleteRegistrationStep5')
                ->with('error', 'Une erreur est survenue');
        }
    }

    public function storeCompleteRegistrationStep5_check()
    {
        if(!Auth::check())
        {
            return Redirect::to('/register')->with('message', 'Vous devez être inscrit pour accéder à votre espace candidat et remplir ce formulaire');
        }
        $user = User::find(Auth::user()->id);
        $enterprise = $user->enterprise()->first();
        $enterprise->registration_state = 'final';
        if($enterprise->is_pay != 0 OR $enterprise->is_pay === 1)
            return Redirect::action('CandidatsController@getCompleteRegistrationFinal')->with('message', 'Vous avez déjà effectué le payment');
        $enterprise->is_pay = 2;
        $user->enterprise()->save($enterprise);
        return Redirect::action('CandidatsController@getCompleteRegistrationFinal')->with('message', 'Vous êtes désormais inscrit, nous étudirons votre dossier apres avoir reçu votre chèque.');
    }

    public function getCompleteRegistrationStep5()
    {
        return View::make('enterprises.complete-inscription-step5');
    }

    public function getCompleteRegistrationFinal()
    {
        return View::make('enterprises.complete-inscription-final');
    }

    public function getPaymentStatus()
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');

        if (Input::get('PayerID') == '' || Input::get('token') == '') {
            return Redirect::action('CandidatsController@getCompleteRegistrationStep5')
                ->with('message', 'Le payement à été refusé.');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        // echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') {
            $user = User::find(Auth::user()->id);
            $enterprise = $user->enterprise()->first();
            $enterprise->registration_state = 'final';
            if($enterprise->is_pay != 0)
                return Redirect::action('CandidatsController@getCompleteRegistrationStep5')->with('message', 'Vous avez déjà effectué le payment');
            $enterprise->is_pay = 1;
            $user->enterprise()->save($enterprise);
            return Redirect::action('CandidatsController@getCompleteRegistrationFinal')->with('message', 'Le payement à été effectué.');
        }
        return Redirect::action('CandidatsController@getCompleteRegistrationStep5')
            ->with('message', 'Le payement à été refusé.');
    }
}
