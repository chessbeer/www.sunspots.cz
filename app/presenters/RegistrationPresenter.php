<?php

/**
 * Registrace presenter.
 */
class RegistrationPresenter extends BasePresenter {

    protected function createComponentRegistrationForm($name) {
	$form = new \RegistrationForm($this, $name);
	return $form;
    }

    public function renderDefault() {
	$form = $this['registrationForm'];

	$this->template->form = $form;
    }
    
    protected function startup() {
	parent::startup();


	$session = $this->presenter->getSession('data');
	$user = $session->user;


	if (!empty($session->user['email'])) {
  $this->redirect('Homepage:');}


    }

}
