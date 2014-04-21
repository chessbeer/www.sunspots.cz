<?php

class FacebookAuthenticator
{

/** @var UserModel */
private $userModel;

public function __construct(UserModel $userModel)
{
$this->userModel = $userModel;
}

/**
* @param array $fbUser
* @return \Nette\Security\Identity
*/
public function authenticate(array $fbUser)
{
$user = $this->userModel->findUser(array('email' => $fbUser['email']));

if ($user) {

$this->updateMissingData($user, $fbUser);
} else {
$user = $this->register($fbUser);
}

//return $user;
return $this->userModel->createIdentity($user);
}

public function register(array $me)
{
$user = $this->userModel->registerUser(array(
'email' => $me['email'],
'fbuid' => $me['id'],
'name' => $me['name'],
'admin' => 0,
));
      return $user;
}

public function updateMissingData($user, array $me)
{
$updateData = array();

if (empty($user['name'])) {
$updateData['name'] = $me['name'];
}

if (empty($user['fbuid'])) {
$updateData['fbuid'] = $me['id'];
}

if (!empty($updateData)) {
$this->userModel->updateUser($user, $updateData);
}
}

}