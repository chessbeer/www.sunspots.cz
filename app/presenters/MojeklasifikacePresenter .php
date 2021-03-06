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
	$result = $classification->find($find)->sort(array("img_id" => -1));
  $count = 0;	
  foreach ($result as $row => $x) {
       $count++;
      $images[$count] = $x['img_id'];
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
    
  if($count !=0){ 
	$this-> template -> images = $images;
  $this-> template -> zpc = $zpc;
  $this-> template -> number = $number;
  $this-> template -> comment = $comment;
  $this-> template -> mcintosh = $mcintosh_class;
  }
  $this-> template -> count = $count;
  



    }

    public function handleDelete($id) {
    $session = $this->presenter->getSession('data');
	$user = $session->user['email'];
	  $image = substr($id, 0, -2);
    $number = substr($id, -1);

 
	$classification = $this->presenter->context->mongo->sunspots->classification;
  
    if($classification->remove(array('user' => $user, 'img_id' => $image, 'number' => $number))){
    $this->flashMessage('Klasifikace smazána.');}
    else{
    $this->flashMessage('Klasifikaci se nepoadařilo smazat.');}
    }

 

}
