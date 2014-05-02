<?php

/**
 * Registration presenter.
 */
class EditPresenter extends BasePresenter {

    protected function createComponentEditForm($name) {
	$form = new \EditForm($this, $name);
	return $form;
    }

    public function renderDefault() {
	$form = $this['editForm'];

	$this->template->form = $form;
    }
    
    protected function startup() {
	parent::startup();


	$session = $this->presenter->getSession('data');
	$user = $session->user;


	if (!empty($session->user['email'])) {

	} else {$this->redirect('Homepage:');}


    }

}