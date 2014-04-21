<?php

use Nette\Security,
 Nette\Utils\Strings;

/*
  CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password char(60) NOT NULL,
  role varchar(20) NOT NULL,
  PRIMARY KEY (id)
  );
 */

/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements Security\IAuthenticator {

 

    /**
     * Performs an authentication.
     * @return Nette\Security\Identity
     * @throws Nette\Security\AuthenticationException
     */
    public function authenticate(array $credentials) {
        

    }

    /**
     * Computes salted password hash.
     * @param  string
     * @return string
     */
    public static function calculateHash($password, $salt = null) {
        if ($salt === null) {
            $salt = '$2a$07$' . Nette\Utils\Strings::random(32) . '$';
        }
        return crypt($password, $salt);
    }

}
