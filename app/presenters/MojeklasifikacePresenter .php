<?php
use Nette\Application\UI;


/**
 * MojeKlasifikace presenter.
 */
class MojeklasifikacePresenter extends BasePresenter {
    public function renderDefault() {
	
	$session = $this->presenter->getSession('data');
	$user = $session->user['email'];
	


	$classification = $this->presenter->context->mongo->sunspots->classification;
	$find = array("user" => $user);
	$result = $classification->find($find)->sort(array("prague_timestamp" => -1));
  $count = 0;	
  foreach ($result as $row => $x) {
       $count++;
      $images[$count] = $x['prague_timestamp'];
	    $number[$count] = $x['number'];
      $zpc[$count] = $x['zpc'];
      $comment[$count] = $x['comment'];
  }
  
  
  $mcintosh = $this->presenter->context->mongo->sunspots->McIntosh;              
  $mc_class = $mcintosh->find();
  $mcintosh_class = array();
  $count2 = 1;
   foreach ($mc_class as $row => $x) {
         $mcintosh_class[$count2] = $x['class'];
         $count2++;
        }
    
   
	$this-> template -> images = $images;
  $this-> template -> zpc = $zpc;
  $this-> template -> number = $number;
  $this-> template -> comment = $comment;
  $this-> template -> mcintosh = $mcintosh_class;
  $this-> template -> count = $count;
  

          

    }



}
