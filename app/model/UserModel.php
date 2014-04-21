<?php

use Nette\Database\Connection;
use Nette\Database\Table\ActiveRow;
use Nette\Security\Identity;
use Nette\Application\UI;
use Nette\ComponentModel\IContainer;

use Nette\Diagnostics\Debugger;


class UserModel
{

private $database;
private $mongo;

public function __construct(MongoClient $mongo)
{
$this->mongo = $mongo;
$this->database = $mongo->sunspots;

}

public function findUser(array $by)
{
return $user = $this->database->user->findOne($by);

}

public function updateUser(array $user, array $values)
{

  

        $newdata = array('$set' => $values);
        
           $this->database->user->update(array("email" => $user['email']), $newdata);

}

public function registerUser(array $values)
{


      $this->database->user->insert($values);
      return $user = $this->findUser(array('email' => $values['email']));
}

public function createIdentity(array $user)
{

unset($user['password']);

return $user;   

}

}