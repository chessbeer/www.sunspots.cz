<?php

use Nette\Application\UI;
use Nette\Forms\Form;
/**
 * Edit presenter.
 */
class EditPresenter extends BasePresenter {

    protected function createComponentEditForm() {
	$form = new UI\Form;
	$form->addText('name', 'Jméno:');
	$form->addText('surname', 'Příjmení:');
	$form->addText('title', 'Titul:');

	$form->addText('year', 'Rok narození:')
	    ->addCondition(Form::FILLED)->addRule(Form::INTEGER, 'Rok narození musí být číslo.')
	    ->addRule(Form::RANGE, 'Musíš být od 13 do 113 let.', array(1900, 2000));;


	$form->addPassword('password', 'Heslo:');

	$form->addPassword('passwordVerify', 'Heslo znovu:')
	    ->addRule(Form::EQUAL, 'Hesla se neshodují', $form['password']);

	$form->addSubmit('send', 'Potvrdit');


	// call method signInFormSucceeded() on success
	$form->onSuccess[] = $this->EditFormSucceeded;
	return $form;
    }



    public function EditFormSucceeded($form) {

	$values = $form->getValues();

	$this->flashMessage('Data byla změněna.');

                   

	$this->redirect('Edit:');
    }


}