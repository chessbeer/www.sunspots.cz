<?php

use Nette\Application\UI,
 Nette\ComponentModel\IContainer,
 Nette\Application\UI\Form;

class RegistrationForm extends Form {

    public function __construct(IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);

        $context = $this->presenter->context;
   
       
        
            $this->addText('email', 'Email:')->setRequired('Email je povinný!')
                    ->addRule(Form::EMAIL, 'Zadej platnou emailovou adresu.');
       
                
            $this->addPassword('password', 'Heslo:', 20)
                    ->setOption('description', 'alespoň 8 znaků')
                    ->addRule(Form::FILLED, 'Zadej heslo')
                    ->addRule(Form::MIN_LENGTH, 'Heslo musí obsahovat alespoň %d znaků.', 8)
                    ->setRequired('Musíš zadat heslo!');
            $this->addPassword('password2', 'Heslo znovu:', 20)
                    ->addConditionOn($this['password'], Form::VALID)
                    ->addRule(Form::FILLED, 'Musíš potvrdit heslo.')
                    ->addRule(Form::EQUAL, 'Hesla se neshodují.', $this['password']);
        
           
    

       
            $this->addSubmit('send', 'Registrovat');
            
            $this->onSuccess[] = callback($this, 'registrationFormSubmitted');
        
    }

     public function registrationFormSubmitted(Form $form) {
        
     
        $values = $form->getValues();
        $db = $this->presenter->context->mongo->sunspots->user;
    
          
         
           
        if ($db->findOne(array('email' => $values->email)) !== NULL) {
            $this['email']->addError('E-mail je již zaregistrován');
            return;
        }

      

        $values->password = Authenticator::calculateHash($values->password);
        
        unset($values->email2);
        unset($values->password2);
        $insert = array("email" => $values->email, "password" => $values->password, "admin" => 0);

        if ($db->insert($insert)) {
            $this->presenter->flashMessage('Registrace úspěšná, prosím přihlašte se', 'success');
            $this->presenter->redirect('SignIn:');
        } else {
            $this->addError('Vytvoření účtu selhalo. Prosím kontaktujte administrátora.');
        }
    }

}

