<?php

use Nette\Application\UI,
 Nette\ComponentModel\IContainer,
 Nette\Application\UI\Form;

class EditForm extends Form {

    public function __construct(IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);

             $context = $this->presenter->context;
          	$session = $this->presenter->getSession('data');
	$user = $session->user['email'];
	


	$info = $this->presenter->context->mongo->sunspots->user;
  $result = $info->findOne(array("email" => $user));
           
            if(isset($result['name'])){
            $this->addText('name', 'Jméno:')->setDefaultValue($result['name']);
            }else{
            $this->addText('name', 'Jméno:');
            }
                    
             $this->addPassword('oldpassword', 'Staré heslo:', 20);
                
            $this->addPassword('password', 'Nové heslo:', 20)
                    	->addConditionOn($this['oldpassword'], Form::FILLED)
                          ->addRule(Form::FILLED, 'Zadej nové heslo')
                            ->addRule(Form::MIN_LENGTH, 'Heslo musí obsahovat alespoň %d znaků.', 8);
            $this->addPassword('password2', 'Nové heslo znovu:', 20)
                    ->addConditionOn($this['oldpassword'], Form::FILLED)
                    ->addConditionOn($this['password'], Form::VALID)
                    ->addRule(Form::FILLED, 'Musíš potvrdit heslo.')
                    ->addRule(Form::EQUAL, 'Hesla se neshodují.', $this['password']);
        
           
    

       
            $this->addSubmit('send', 'Změnit data');
            
            $this->onSuccess[] = callback($this, 'editFormSubmitted');
        
    }

     public function editFormSubmitted(Form $form) {
        
          $session = $this->presenter->getSession('data');
	$user = $session->user['email'];
        $values = $form->getValues();
        $db = $this->presenter->context->mongo->sunspots->user;
    
          
         
           
        $result = $db->findOne(array('email' => $user));

          if (empty($values->password)){
           if(!isset($result['name']) && empty($values->name)){
           $this->presenter->flashMessage('Nebyly provedeny žádné změny.', 'unsuccess');
           
       
           } else{
           
                      $update = array('$set' => array("name" => $values->name));

        if ($db->update(array("email" => $user), $update)) {
            $this->presenter->flashMessage('Data úspěšně změněna.', 'success');
            
        } else {
            $this->presenter->flashMessage('Nastala neočekávaná chyba. Prosím kontaktujte administrátora.', 'unsuccess');
        }
           
            
           
           } 
          
          


          }else if(!isset($result['password'])){
            if (!empty($values->password)){
              $values->password = Authenticator::calculateHash($values->password);
              $update = array('$set' => array("name" => $values->name, "password" => $values->password));

        if ($db->update(array("email" => $user), $update)) {
            $this->presenter->flashMessage('Data úspěšně změněna.', 'success');
            
        } else {
            $this->presenter->flashMessage('Nastala neočekávaná chyba. Prosím kontaktujte administrátora.', 'unsuccess');
        }
            }
          
          }
          else if($result['password'] == Authenticator::calculateHash($values->oldpassword, $result['password'])){

        $values->password = Authenticator::calculateHash($values->password);
        
      
        $update = array('$set' => array("name" => $values->name, "password" => $values->password));

        if ($db->update(array("email" => $user), $update)) {
            $this->presenter->flashMessage('Data úspěšně změněna.', 'success');
            
        } else {
            $this->presenter->flashMessage('Nastala neočekávaná chyba. Prosím kontaktujte administrátora.', 'unsuccess');
        }
    } else {
           $this->presenter->flashMessage('Špatné původní heslo', 'unsuccess');
    
    }
   $this->presenter->redirect('Edit:');
}

}