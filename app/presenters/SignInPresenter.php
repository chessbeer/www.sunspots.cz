<?php

use Nette\Application\UI;


/**
 * Sign in presenters.
 */
class SignInPresenter extends BasePresenter {
    private $url;
    public function actionDefault($url) {


	$this -> url = $url;
    }

    protected function createComponentSignInForm($name) {
	$form = new \SignInForm($this, $name);
	return $form;
    }

    public function renderDefault() {
	$fbUrl = $this->context->facebook->getLoginUrl(array(
	    'scope' => 'email',
	    'redirect_uri' => $this->link('//fbLogin'), 
	));

	$this->template->fbUrl = $fbUrl;


    }

    public function actionIn() {
    // facebook
	$fbUrl = $this->context->facebook->getLoginUrl(array(
	    'scope' => 'email',
	    'redirect_uri' => $this->link('//fbLogin'), 
	));

	$this->template->fbUrl = $fbUrl;

    }

    public function actionFbLogin() {
	$me = $this->context->facebook->api('/me');
	$identity = $this->context->facebookAuthenticator->authenticate($me);

	$session = $this->presenter->getSession('data');
	$session->user = $identity;

	$this->presenter->flashMessage('Byl jsi úspěšně přihlášen', 'success');
	if(!empty($session->redirect['presenter'])){
               if(!empty($session->redirect['id'])){
                   $this->presenter->redirect($session->redirect['presenter'], $session->redirect['id']);
               }else{
                   $this->presenter->redirect($session->redirect['presenter']);
               }
          }else{
          $this->presenter->redirect('Homepage:'); }
  

    }
    
    protected function startup() {
	parent::startup();


	$session = $this->presenter->getSession('data');
	$user = $session->user;


	if (empty($session->user['email'])) {

	} else {$this->redirect('Homepage:');}


    }

}