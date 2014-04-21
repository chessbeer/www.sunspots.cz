<?php
use Nette\Application\UI;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
/**
 * Klasifikace presenter.
 */
class KlasifikacePresenter extends BasePresenter {
    public function renderDefault($id) {
	$this -> template -> num = $id;
	$session = $this->presenter->getSession('data');
	$user = $session->user['email'];
	$image = substr($id, 0, -2);
	$number = substr($id, -1);


	$classification = $this->presenter->context->mongo->sunspots->classification;
	$find_user = array("user" => $user, "prague_timestamp" => $image, "number" => $number);
	$result = $classification->findOne(array("user" => $user, "prague_timestamp" => $image, "number" => $number));
  $mcintosh = $this->presenter->context->mongo->sunspots->McIntosh;              
  $mc_class = $mcintosh->find();
  $mcintosh_class = array();
  $count = 1;
   foreach ($mc_class as $row => $x) {
         $mcintosh_class[$count] = $x['class'];
         $count++;
        }
    
  $crop_count=0;
  $crop_image = $this->presenter->context->mongo->sunspots->crop_image;
	    $result2 = $crop_image->find(array("prague_timestamp" => "$image.jpg"));
	    foreach ($result2 as $row2 => $x2) {
		$crop_count++;
    }
   
    
	$this-> template -> zpc = $result['zpc'];
	$session->classification['zpc'] = $result['zpc'];
	$this-> template -> comment = $result['comment'];
	$session->classification['comment'] = $result['comment'];
	$session->redirect['presenter']= 'Klasifikace:';
	$session->redirect['id']= $id;
  $this-> template -> back = $session->redirect2['id'];         
  $this-> template -> crop_count = $crop_count;
  $this-> template -> number = intval($number);
   	
	$other_class = $classification->find(array("prague_timestamp" => $image, "number" => $number));
  $i=0;
	$classifications = array();
  
	foreach ($other_class as $row => $x) {
      if($x['zpc']==null){
      $x['zpc'] = 61;}
      if ($user != $x['user']){
      if (!empty($x['comment'])){
          
      $classifications[$i][0] = 'Uživatel ' .$x['user'] . ', klasifikace: ' .$mcintosh_class[$x['zpc']]. ' s komentářem: ' .$x['comment'];
    
      
      }
      else{
	    $classifications[$i][0] = 'Uživatel ' .$x['user'] . ', klasifikace: ' .$mcintosh_class[$x['zpc']];
      }
      $classifications[$i][1] = $x['user'];
      $classifications[$i][2] = $x['zpc'];
      $i++;
     }
	}
  
    
    $this-> template -> other_class =  $classifications;

    }

    protected function createComponentKlasifikaceForm() {
	$form = new UI\Form;

	$session = $this->presenter->getSession('data');

	$zpc = $session->classification['zpc'];



  $form->addSelect('klasifikace', 'Skvrna je typu', array(
	    '61' => '-',
      '1' => 'A - Ax - Axx',
      '2' => 'B - Bx - Bxo',
      '3' => 'B - Bx - Bxi',
      '5' => 'C - Cr - Cro',
      '6' => 'C - Cr - Cri',
      '11' => 'C - Cs - Cso',
      '12' => 'C - Cs - Csi',
      '9' => 'C - Ca - Cai',
      '8' => 'C - Ca - Cao',
      '41' => 'C - Ch - Cho',
      '42' => 'C - Ch - Chi',
      '38' => 'C - Ck - Cko',
      '39' => 'C - Ck - Cki',
      '4' => 'H - Hr - Hrx',
      '7' => 'H - Ha - Hax',
      '10' => 'H - Hs - Hsx',
      '13' => 'D - Dr - Dro',
      '14' => 'E - Er - Ero',
      '15' => 'F - Fr - Fro',
      '16' => 'D - Dr - Dri',
      '17' => 'E - Er - Eri',
      '18' => 'F - Fr - Fri',
      '19' => 'D - Da - Dao',
      '20' => 'E - Ea - Eao',
      '21' => 'F - Fa - Fao',
      '22' => 'D - Da - Dai',
      '23' => 'E - Ea - Eai',
      '24' => 'F - Fa - Fai',
      '25' => 'D - Ds - Dso',
      '26' => 'E - Es - Eso',
      '27' => 'F - Fs - Fso',
      '28' => 'D - Ds - Dsi',
      '29' => 'E - Es - Esi',
      '30' => 'F - Fs - Fsi',
      '31' => 'D - Da - Dac',
      '32' => 'E - Ea - Eac',
      '33' => 'F - Fa - Fac',
      '34' => 'D - Ds - Dsc',
      '35' => 'E - Es - Esc',
      '36' => 'F - Fs - Fsc',
      '37' => 'H - Hk - Hkx',
      '40' => 'H - Hh - Hhx',
      '43' => 'D - Dk - Dko',
      '44' => 'E - Ek - Eko',
      '45' => 'F - Fk - Fko',
      '46' => 'D - Dk - Dki',
      '47' => 'E - Ek - Eki',
      '48' => 'F - Fk - Fki',
      '49' => 'D - Dh - Dho',
      '50' => 'E - Eh - Eho',
      '51' => 'F - Fh - Fho',
      '52' => 'D - Dh - Dhi',
      '53' => 'E - Eh - Ehi',
      '54' => 'F - Fh - Fhi',
      '55' => 'D - Dk - Dkc',
      '56' => 'E - Ek - Ekc',
      '57' => 'F - Fk - Fkc',
      '58' => 'D - Dh - Dhc',
      '59' => 'E - Eh - Ehc',
      '60' => 'F - Fh - Fhc',
    	    ))->setDefaultValue($zpc);
          

	$form->addTextArea ('comment', 'Komentář:')->setDefaultValue($session->classification['comment']);
	
  $form->addHidden('num');

	$form->addSubmit('send', 'Potvrdit změny')->onClick[] = callback($this, 'KlasifikaceFormSucceeded');


	$form->addSubmit('cancel', 'Zavřít')->onClick[] = callback($this, 'cancelKlasifikaceFormSubmitted');

	
	return $form;
    }



    public function KlasifikaceFormSucceeded($submit) {

	$values = $submit->form->getValues();
	$session = $this->presenter->getSession('data');
	$user = $session->user['email'];
	$image = substr($values['num'], 0, -2);
	$number = substr($values['num'], -1);

	$classification = $this->presenter->context->mongo->sunspots->classification;
	$find = array("user" => $user, "prague_timestamp" => $image, "number" => $number);
	$insert = array("user" => $user, "prague_timestamp" => $image, "number" => $number, "zpc" => $values['klasifikace'], "comment" => $values['comment']);



	if($classification->update($find, $insert, array("upsert" => true))) {

	    $this->flashMessage('Hodnocení přijato.');
	}

	else {
	    $this->flashMessage('Něco se rozbilo.');
	}


    }

    public function cancelKlasifikaceFormSubmitted($submit) {

	$this->flashMessage('Změny zrušeny.');
	$this->redirect('this');
    }
                  
                  
    protected function createComponentOpravaForm() {
	$form = new UI\Form;

   $form->addHidden('num');
   $form->addHidden('user');
   $form->addHidden('zpc');
   $form->addHidden('user_zpc');
	$form->addSubmit('send', 'Opravit klasifikaci')->onClick[] = callback($this, 'OpravaFormSucceeded');


	
	return $form;
    
  }
  
    public function OpravaFormSucceeded($submit) {

	$values = $submit->form->getValues();
	$session = $this->presenter->getSession('data');
	
  if(empty($values['zpc']) || $values['zpc'] == '61'){
    $this->flashMessage('Nejprve musíte skvrnu klasifikovat, abyste mohl opravovat špatné klasifikace.');
	$this->redirect('this');
  }
  if($values['zpc'] == $values['user_zpc']){
    $this->flashMessage('Uživatelova klasifikace je stejná jako vaše.');
	$this->redirect('this');
  }
  
  $image = substr($values['num'], 0, -2);
	$number = substr($values['num'], -1);

	$classification = $this->presenter->context->mongo->sunspots->classification;
	$find = array("user" => $values['user'], "prague_timestamp" => $image, "number" => $number);
	$update = array('$set' => array("zpc" => $values['zpc']));




	if ($classification->update($find, $update)) {


  $mcintosh = $this->presenter->context->mongo->sunspots->McIntosh;              
  $mc_class = $mcintosh->find();
  $mcintosh_class = array();
  $count = 1;
   foreach ($mc_class as $row => $x) {
         $mcintosh_class[$count] = $x['class'];
         $count++;
        }
  if($values['user_zpc']==null){
  $values['user_zpc'] = 61;
  }      
  $subject = 'Změna klasifikace';
  $message = 'Dobrý den,
  
  Vaše klasifikace skvrny číslo ' . $number . ' u snímku s ID ' .$image. ' byla změněna.
  Správná klasifikace je '.$mcintosh_class[$values['zpc']].
  ' (Vaše původní klasifikace byla ' . $mcintosh_class[$values['user_zpc']]. ').
  Pokud máte nějaké připomínky, neváhejte nás kontaktovat.
  
  S pozdravem JT.';

     
 $mail = new Message;
 $mail->setFrom('admin@sunspots.cz')
    ->addTo($values['user'])
    ->setSubject($subject)
    ->setBody($message);
          
  $mailer = new SendmailMailer;
if($mailer->send($mail)){
      
     
         $this->flashMessage('Klasifikace opravena a uživatel upozorněn emailem.');
       }else{

	    $this->flashMessage('Klasifikace opravena.');
      }
	}

	else {
	    $this->flashMessage('Něco se rozbilo.');
	}
  



    }

}
