<?php

use Nette\Application\UI;


/**
 * Admin presenter.
 */
class AdminPresenter extends BasePresenter {


    protected function createComponentUploadForm() {

	$form = new UI\Form;
	$form->addUpload('obrazky', 'Procházet:')
  ->setRequired('Vyber snímek.');;


	$day = array(
	    '01' => '1',
	    '02' => '2',
	    '03' => '3',
	    '04' => '4',
	    '05' => '5',
	    '06' => '6',
	    '07' => '7',
	    '08' => '8',
	    '09' => '9',
	    '10' => '10',
      '11' => '11',
      '12' => '12',
      '13' => '13',
      '14' => '14',
      '15' => '15',
      '16' => '16',
      '17' => '17',
      '18' => '18',
      '19' => '19',
      '20' => '20',
      '21' => '21',
      '22' => '22',
      '23' => '23',
      '24' => '24',
      '25' => '25',
      '26' => '26',
      '27' => '27',
      '28' => '28',
      '29' => '29',
      '30' => '30',
      '31' => '31'
      
      
	);
	$month = array(
	    '01' => 'leden',
	    '02' => 'únor',
	    '03' => 'březen',
	    '04' => 'duben',
	    '05' => 'květen',
	    '06' => 'červen',
	    '07' => 'červenec',
	    '08' => 'srpen',
	    '09' => 'září',
	    '10' => 'říjen',
	    '11' => 'listopad',
	    '12' => 'prosinec'
	);
 

	$form->addSelect('day', 'Den:', $day);
	$form->addSelect('month', 'Měsíc:', $month);
  $form->addText('year', 'Rok:')
	    ->setRequired('Zadej rok.');


	$form->addText('time', 'Čas: (ve formátu hh:mm)')
	    ->setRequired('Zadej čas ve formátu hh:mm.');


	$form->addTextArea ('comment', 'Komentář ke snímku:');


	$form->addSubmit('send', 'Nahrát');

	$form->onSuccess[] = $this->UploadFormSucceeded;
	return $form;



    }



    public function UploadFormSucceeded($form) {

	$values = $form->getValues();

	$image = $this->presenter->context->mongo->sunspots->image;

	$uploadDir = './obrazky'; 
	$allowedExt = array('jpg', 'jpeg', 'png', 'gif'); 



	// zpracovani uploadu
	if(isset($_FILES['obrazky'])) {


	    $allowedExt = array_flip($allowedExt);
	   
	    $tmpName = $_FILES['obrazky']['tmp_name'];
	    

	    $fileName_no_ext = "P_". $values['year']."-".$values['month']
		."-".$values['day']."_". substr($values['time'], 0, 2) ."-". substr($values['time'], 3);
	    $fileName = $fileName_no_ext.".jpg";
	   
	    if ($image->findOne(array('prague_timestamp' => $fileName)) !== NULL) {
		$this->presenter->flashMessage('Snímek už je v databázi');
		return;
	    }

       if (strlen($values['time'])!= 5){
        $this->presenter->flashMessage('Špatně zadaný čas.');
		return;
       }

      if (intval($values['year']) < 1950 || intval($values['year']) > 2014) {
        $this->presenter->flashMessage('Neplatný rok.');
		return;
       }
       if (intval($values['year']) == 2014 && intval($values['month']) > 4){
        $this->presenter->flashMessage('Nelze nahrát snímek z budoucnosti.');
		return;
       }
        if (((intval($values['month']) == 4 || intval($values['month']) == 6 || intval($values['month']) == 9 ||
        intval($values['month']) == 11) && intval($values['day']) == 31) || (intval($values['month']) == 2 && intval($values['day']) > 29) ||
        (intval($values['month']) == 2 && intval($values['day']) == 29 && intval($values['year'])%4 != 0) ){
          $this->presenter->flashMessage('Zadaný měsíc nemá tolik dní.');
		return;
        }
    
       
      if (!is_numeric(substr($values['time'], 0, 2))){      
         $this->presenter->flashMessage('Špatně zadaný čas, musí být číselný.');
		return;
      }
       if (!is_numeric(substr($values['time'], 3))){      
         $this->presenter->flashMessage('Špatně zadaný čas, musí být číselný.');
		return;
      }
       
       
       if (intval(substr($values['time'], 0, 2)) > 23 || intval(substr($values['time'], 3)) > 59 || substr($values['time'], 2, 1) != ':'){
        $this->presenter->flashMessage('Špatně zadaný čas.');
		return;
         }
       
       

	    if (intval($values['year'])>2010) {

		$x = intval(substr($values['time'], 0, 2))*60 + intval(substr($values['time'], 3));

		$y = round($x/90);

		$nasaTime = '0000';

		switch ($y) {
		    case 0: $nasaTime = '0000'; break;
		    case 1: $nasaTime = '0130'; break;
		    case 2: $nasaTime = '0300'; break;
		    case 3: $nasaTime = '0430'; break;
		    case 4: $nasaTime = '0600'; break;
		    case 5: $nasaTime = '0730'; break;
		    case 6: $nasaTime = '0900'; break;
		    case 7: $nasaTime = '1030'; break;
		    case 8: $nasaTime = '1200'; break;
		    case 9: $nasaTime = '1330'; break;
		    case 10: $nasaTime = '1500'; break;
		    case 11: $nasaTime = '1630'; break;
		    case 12: $nasaTime = '1800'; break;
		    case 13: $nasaTime = '1930'; break;
		    case 14: $nasaTime = '2100'; break;
		    case 15: $nasaTime = '2230'; break;
		    case 16: $nasaTime = '2230'; break;

		}



		$nasaAdr ="http://sohowww.nascom.nasa.gov//data/REPROCESSING/Completed/"
		    .$values['year']."/hmiigr/".$values['year'].$values['month'].$values['day']."/".$values['year'].$values['month'].$values['day']."_".$nasaTime."_hmiigr_1024.jpg" ;

		$nasaFileName = "N_".$values['year']."-".$values['month']
		    ."-". $values['day']."_". substr($nasaTime, 0, 2) ."-". substr($nasaTime, 2) .".jpg";


		//get image from nasa!
		if (copy($nasaAdr, './obrazky/'.$nasaFileName)) {
		    $this->presenter->flashMessage('Snímek NASA stáhnut.');
		}else {
		    $this->presenter->flashMessage('Snímek NASA se nepodařilo stáhnout.');

		}


	    }else {

		$this->presenter->flashMessage('Snímek NASA neexistuje.');}

	    $insert = array("prague_timestamp" => $fileName, "nasa_timestamp" => $nasaFileName, "comment" => $values['comment']);


		    // presun souboru
	    if(move_uploaded_file($tmpName, "{$uploadDir}".DIRECTORY_SEPARATOR."{$fileName}") && $image->insert($insert)) {
		$pathname = './obrazky/'.$fileName_no_ext.'/';
		mkdir ($pathname, $mode = 0777, $recursive = true);
		$this->presenter->flashMessage('Snímek nahrán.');
		$this->presenter->redirect('Admin:Upload');

	    } else {
		$this->presenter->flashMessage('Snímek se nepodařilo nahrát.');
	    }

    	
  }

    }



    protected function createComponentUserForm() {



	$user = $this->presenter->context->mongo->sunspots->user;
	$result = $user->find();

	$emails = array();
	foreach ($result as $row => $x) {


	    $emails[$x['email']] = $x['email'] . ' aktualni role je ' .$x['admin'];
	}

	$form = new UI\Form;
	$form->addSelect('user', 'Zvol usera:', $emails);

	$admin = array(
	    '0' => '0, user',
	    '1' => '1, upload obrazku',
	    '2' => '2, upload+prava userum'
	);
	$form->addSelect('role', 'Nastav roli:', $admin);

	$form->addSubmit('send', 'Nastavit');

	$form->onSuccess[] = $this->UserFormSucceeded;
	return $form;



    }
  
    public function UserFormSucceeded($form) {
	$user = $this->presenter->context->mongo->sunspots->user;

	$values = $form->getValues();

	$newdata = array('$set' => array("admin" => $values->role));


	if ($user->update(array("email" => $values->user), $newdata)) {
	    $this->presenter->flashMessage('Zmeny byly provedeny');
	    $this->presenter->redirect('Admin:User');

	} else {
	    $this->presenter->flashMessage('Provedení změn se nezdařilo. Prosím kontaktujte administrátora.');
	}

    }

    protected function createComponentCropForm() {



  $user = $this->presenter->context->mongo->sunspots->user;
	$result = $user->find();



	$form = new UI\Form;
	$form->addHidden('x1');
	$form->addHidden('y1');
	$form->addHidden('x2');
	$form->addHidden('y2');
	$form->addHidden('w');
	$form->addHidden('h');
	$form->addHidden('img');
	$form->addHidden('num');

	$form->addSubmit('submit', 'Vyber oblast');


	$form->onSuccess[] = $this->CropFormSucceeded;
	return $form;

      }
 
    public function CropFormSucceeded($form) {

	$values = $form->getValues();
	if ($values->w < 1 || $values->h < 1) {
	    $this->presenter->flashMessage('Musis vybrat vyrez');
	}else {

	    $crop_image = $this->presenter->context->mongo->sunspots->crop_image;

	    $values = $form->getValues();
	    $uploadDir = './obrazky';
	    $targ_w = $values->x2/0.2 - $values->x1/0.2;
	    $targ_h = $values->y2/0.2 - $values->y1/0.2;
	    $jpeg_quality = 90;

      $src = $uploadDir.'/'.$values->img.'.jpg';
	    $dst = $uploadDir.'/'.$values->img.'/'.$values->num.'.jpg';
	    $img_r = imagecreatefromjpeg($src);
	    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	    imagecopyresampled($dst_r,$img_r,0,0,$values->x1/0.2,$values->y1/0.2,
		$targ_w,$targ_h,$targ_w,$targ_h);

	    if (file_exists($uploadDir.'/'.$values->img)) {
		header('Content-type: image/jpeg');
		imagejpeg($dst_r,$dst,$jpeg_quality);



		$newdata = array("prague_timestamp" => $values->img.'.jpg', "x1" => $values->x1/0.2, "x2" => $values->x2/0.2,
		    "y1" => $values->y1/0.2, "y2" => $values->y2/0.2, "number" => $values->num);


		if ($crop_image->insert($newdata)) {
		    $this->presenter->flashMessage('Zmeny byly provedeny');
		    $this->presenter->redirect('this');

		} else {
		    $this->addError('Provedení změn se nezdařilo. Prosím kontaktujte administrátora.');
		}
	    }else {$this->presenter->flashMessage('Neocekavana chyba');}
	}
    }

    protected function startup() {
	parent::startup();


	$session = $this->presenter->getSession('data');
	$user = $session->user;


	if (intval($session->user['admin']) == 1 || intval($session->user['admin'] == 2)) {

	} else {$this->redirect('Homepage:');}


    }



    public function renderDefault() {
    }

    public function renderUpload() {
    }

    public function renderUser() {
    }

    public function renderImage($id) {
	if (!isset($id)) {
	    $id = 0;
	}
	$this -> template -> num = $id;
	$image = $this->presenter->context->mongo->sunspots->image;


	$result = $image->find();


	if ($result == NULL) {
	    $this['result']->addError('Nejsou k dispozici zadne snimky');
	    return;
	}
	$count =0;
	$crop_count =0;
	foreach ($result as $row => $x) {


	    $images[] = $x['prague_timestamp'];

	    $crop_image = $this->presenter->context->mongo->sunspots->crop_image;
	    $result2 = $crop_image->find(array("prague_timestamp" => $x['prague_timestamp']));
	    foreach ($result2 as $row2 => $x2) {
		$crop_count++;
	    }  $crop_images[$count] = $crop_count;
	    $crop_count = 0;
	    $count++;
	}


	if (isset($images)) {
	    $this -> template -> images = $images;



	    $this -> template -> crop_images = $crop_images;
	}
	$this -> template -> count = $count;

    }

    public function renderContact() {
	$contact = $this->presenter->context->mongo->sunspots->contact;
	$result = $contact->find();

	$this->template->result = $result;
    }

}
