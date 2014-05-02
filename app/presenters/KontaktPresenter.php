<?php

use Nette\Application\UI,
 Nette\Application\UI\Form;


/**
 * Kontakt presenter.
 */
class KontaktPresenter extends BasePresenter {



    protected function createComponentKontaktForm() {
	 $session = $this->presenter->getSession('data');
	$user = $session->user;
  
  $form = new UI\Form;
 
  if (empty($user)){
  $form->addText('email', 'Email:')->setRequired('Email je povinný!')
                    ->addRule(Form::EMAIL, 'Zadej emailovou adresu.');
  }
	$form->addText('subject', 'Předmět:')
	    ->setRequired('Zadej předmět.');

	$form->addTextArea ('message', 'Zpráva:')
	    ->setRequired('Nelze odeslat prázdnou zprávu.');

	$form->addSubmit('send', 'Odeslat');
 

	// call method signInFormSucceeded() on success
	$form->onSuccess[] = $this->KontaktFormSucceeded;
	return $form;
    }



    public function KontaktFormSucceeded($form) {

	$values = $form->getValues();
	$session = $this->presenter->getSession('data');
	$user = $session->user;
  if (empty($user)){
  $user['email'] = $values['email'];
  $register = "0";
  }else{$register = "1";}
	$contact = $this->presenter->context->mongo->sunspots->contact;
    $date = date('Y-m-d H:i:s');

	$insert = array("email" => $user['email'], "subject" => $values['subject'], "message" => $values['message'], "timestamp" => $date, "register" => $register);
	if ($contact->insert($insert)) {

	    $this->flashMessage('Zpráva odeslána.');
	    $this->redirect('Kontakt:');
	} else {
	    $this->flashMessage('Vyskytl se problém, zkuste to znovu.');
	}

    }


}