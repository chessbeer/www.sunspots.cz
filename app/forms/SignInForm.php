<?php

use Nette\Application\UI,
 Nette\ComponentModel\IContainer,
 Nette\Application\UI\Form;

class SignInForm extends Form {

    public function __construct(IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);

        $this->addText('email', 'Email:')->setRequired('Vyplňte email');
        $this->addPassword('password', 'Heslo:')->setRequired('Vyplňte heslo');
        $this->addSubmit('sign', 'Přihlásit')->setAttribute('class', 'green');
        $this->onSuccess[] = callback($this, 'signInFormSubmitted');

     }

    public function signInFormSubmitted(UI\Form $form) {
       
        
             $values = $form->getValues();
              $session = $this->presenter->getSession('data');

            $insert = array("email" => $values->email);
            $user = $this->presenter->context->mongo->sunspots->user;
               $result = $user->findOne($insert);

            if ($result['password'] == Authenticator::calculateHash($values->password, $result['password'])){

           $session = $this->presenter->getSession('data');
            $session->user = $result;
           
            $this->presenter->flashMessage('Byl jsi úspěšně přihlášen', 'success');
              
            
          if(!empty($session->redirect['presenter'])){
               if(!empty($session->redirect['id'])){
                   $this->presenter->redirect($session->redirect['presenter'], $session->redirect['id']);
               }else{
                   $this->presenter->redirect($session->redirect['presenter']);
               }
          }else{
          $this->presenter->redirect('Homepage:'); }
            }else
         $this->presenter->flashMessage('Špatné přihlašovací údaje', 'unsuccess');
}

}