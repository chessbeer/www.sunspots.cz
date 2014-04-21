<?php

use Nette\Application\UI;


/**
 * Kontakt presenter.
 */
class KontaktPresenter extends BasePresenter {



    protected function createComponentKontaktForm() {
	$form = new UI\Form;
	$form->addText('subject', 'Předmět:')
	    ->setRequired('Zadej předmět.');

	$form->addTextArea ('message', 'Zpráva:')
	    ->setRequired('Nelze odeslat prázdnou zprávu.');

	$form->addSubmit('send', 'Odeslat');


	$form->onSuccess[] = $this->KontaktFormSucceeded;
	return $form;
    }



    public function KontaktFormSucceeded($form) {

	$values = $form->getValues();
	$session = $this->presenter->getSession('data');
	$user = $session->user;
	$contact = $this->presenter->context->mongo->sunspots->contact;
	$insert = array("email" => $user['email'], "subject" => $values['subject'], "message" => $values['message']);
	if ($contact->insert($insert)) {

	    $this->flashMessage('Zpráva odeslána.');
	    $this->redirect('Kontakt:');
	} else {
	    $this->flashMessage('Vyskytl se problém, zkuste to znovu.');
	}

    }


}