<?php



use Nette\Application\UI;







class AdminPresenter extends BasePresenter {





    protected function createComponentUploadForm() {



	$form = new UI\Form;

	$form->addUpload('obrazky', 'Procházet:')

  ->setRequired('Vyber snímek.');





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



  $form->addText('number', 'Číslo snímku:')

	    ->setRequired('Zadej číslo snímku.');

      

	$form->addTextArea ('comment', 'Komentář ke snímku (nepovinný):');





	$form->addSubmit('send', 'Nahrát');





	// call method signInFormSucceeded() on success

	$form->onSuccess[] = $this->UploadFormSucceeded;

	return $form;







    }







    public function UploadFormSucceeded($form) {



	$values = $form->getValues();



	$image = $this->presenter->context->mongo->sunspots->image;

	// konfigurace

	$uploadDir = './obrazky'; // adresar, kam se maji nahrat obrazky (bez lomitka na konci)

	$allowedExt = array('jpg', 'jpeg', 'png', 'gif'); // pole s povolenymi priponami







	// zpracovani uploadu

	if(isset($_FILES['obrazky'])) {





	    $allowedExt = array_flip($allowedExt);

	    //  foreach($_FILES['obrazky']['name'] as $klic => $nazev) {

	    $tmpName = $_FILES['obrazky']['tmp_name'];

	    //$fileName = basename($_FILES['obrazky']['name']);

        /*$fileName = "P_". substr($values['date'], 0, 4) ."-". substr($values['date'], 4, 2) 

                    ."-". substr($values['date'], 6) ."_". substr($values['time'], 0, 2) ."-". substr($values['time'], 2) .".jpg";*/



	    $fileName = "P_". $values['year']."-".$values['month']

		."-".$values['day']."_". substr($values['time'], 0, 2) ."-". substr($values['time'], 3);

	  //  $fileName = $fileName_no_ext.".jpg";

	    /*  substr($_FILES['obrazky']['name'], -3);

	    if ($image->findOne(array('prague_timestamp' => $fileName)) !== NULL) {

		$this->presenter->flashMessage('Snímek už je v databázi');

		return;

	    }  */

      

      if (intval($values['number']) < 0 || intval($values['number']) > 20000){

        $this->presenter->flashMessage('Špatně zadané číslo snímku.');

		return;

       }

        

        if ($image->findOne(array('_id' => $values['number'])) !== NULL) {

		$this->presenter->flashMessage('Snímek s tímto číslem už je v databázi');

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







		$nasaAdr = "http://sohowww.nascom.nasa.gov//data/REPROCESSING/Completed/"

		    .$values['year']."/hmiigr/".$values['year'].$values['month'].$values['day']."/".$values['year'].$values['month'].$values['day']."_".$nasaTime."_hmiigr_1024.jpg";



		$nasaFileName = "N_".$values['year']."-".$values['month']

		    ."-". $values['day']."_". substr($nasaTime, 0, 2) ."-". substr($nasaTime, 2);



      

		//get image from nasa!

		if (copy($nasaAdr, './obrazky/N_'.$values['number'].'.jpg')) {

		    $this->presenter->flashMessage('Snímek NASA stáhnut.');

		}else {

		    $this->presenter->flashMessage('Snímek NASA se nepodařilo stáhnout.');



		}





	    }else {

      $nasaFileName = 0;

		$this->presenter->flashMessage('Snímek NASA neexistuje.');

    }



	    $insert = array("_id" => $values['number'], "prague_timestamp" => $fileName, "nasa_timestamp" => $nasaFileName, "comment" => $values['comment']);





	    // kontrola souboru

    /*    if(!is_uploaded_file($tmpName)|| !isset($allowedExt[strtolower(pathinfo($fileName, PATHINFO_EXTENSION))])) {

        echo "svine2";

            // neplatny soubor nebo pripona

            continue;

        }  */



	    // presun souboru

	    if(move_uploaded_file($tmpName, "{$uploadDir}".DIRECTORY_SEPARATOR."{$values['number']}.jpg") && $image->insert($insert)) {

		$pathname = './obrazky/'.$values['number'].'/';

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

	$result = $user->find()->sort(array("email" => 1));



	$emails = array();

	foreach ($result as $row => $x) {





	    $emails[$x['email']] = $x['email'] . ' aktualní role je ' .$x['admin'];

	}



	$form = new UI\Form;

	$form->addSelect('user', 'Zvol uživatele:', $emails);



	$admin = array(

	    '0' => '0, uživatel',

	    '1' => '1, upload obrázku + oblasti se skvrnami',

	    '2' => '2, superadmin'

	);

	$form->addSelect('role', 'Vyber roli:', $admin);



	$form->addSubmit('send', 'Změnit');





	// call method signInFormSucceeded() on success

	$form->onSuccess[] = $this->UserFormSucceeded;

	return $form;







    }







    public function UserFormSucceeded($form) {

	$user = $this->presenter->context->mongo->sunspots->user;



	$values = $form->getValues();



	$newdata = array('$set' => array("admin" => $values->role));





	if ($user->update(array("email" => $values->user), $newdata)) {

	    $this->presenter->flashMessage('Změny byly provedeny.');

	    $this->presenter->redirect('Admin:User');



	} else {

	    $this->presenter->flashMessage('Změny nebyly provedeny. Prosím, kontaktujte administrátora.');

	}



    }











      protected function createComponentCropselectForm() {

        $image = $this->presenter->context->mongo->sunspots->image;





	$result = $image->find()->sort(array("_id" => -1));

    



  $count =0;

	$crop_count =0;

	foreach ($result as $row => $x) {



               $images[] = $x['_id'];

                                    }

      

	$form = new UI\Form;

	$form->addSelect('image', 'Vyber snímek:', $images)

  ->setRequired('Vyber snímek.');

  

  	$form->addSubmit('submit', 'Přejít na snímek');

     	$form->onSuccess[] = $this->CropselectFormSucceeded;

	return $form;







    }

      public function CropselectFormSucceeded($form) {



	$values = $form->getValues();

        $this->presenter->redirect('this', $values['image']);

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

	$form->addHidden('number');



	$form->addSubmit('submit', 'Vyber oblast');





	// call method signInFormSucceeded() on success

	$form->onSuccess[] = $this->CropFormSucceeded;

	return $form;







    }







    public function CropFormSucceeded($form) {



	$values = $form->getValues();

	if ($values->w < 1 || $values->h < 1) {

	    $this->presenter->flashMessage('Musíš vybrat výřez');

	}else {



	    //$crop_image = $this->presenter->context->mongo->sunspots->crop_image;

      $image = $this->presenter->context->mongo->sunspots->image;

	    $values = $form->getValues();

	    $uploadDir = './obrazky';

	    $targ_w = $values->x2/0.2 - $values->x1/0.2;

	    $targ_h = $values->y2/0.2 - $values->y1/0.2;

	    $jpeg_quality = 90;





	    $src = $uploadDir.'/'.$values->img.'.jpg';

	    $dst = $uploadDir.'/'.$values->img.'/'.$values->number.'.jpg';

	    $img_r = imagecreatefromjpeg($src);

	    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );



	    imagecopyresampled($dst_r,$img_r,0,0,$values->x1/0.2,$values->y1/0.2,

		$targ_w,$targ_h,$targ_w,$targ_h);



	    if (file_exists($uploadDir.'/'.$values->img)) {

		header('Content-type: image/jpeg');

		imagejpeg($dst_r,$dst,$jpeg_quality);



    $find = array("_id" => $values->img);





		if ($image->update($find, array('$push' => array("crop_images" => array("number" => $values->number, "x1" => $values->x1/0.2, "x2" => $values->x2/0.2,

		    "y1" => $values->y1/0.2, "y2" => $values->y2/0.2))))) {

		   $this->presenter->flashMessage('Změny byly provedeny.'); 

		      	$this->presenter->redirect('this');

      

      

		} else {

		    $this->presenter->flashMessage('Změny nebyly provedeny. Prosím, kontaktujte administrátora.');

		}

	    }else {$this->presenter->flashMessage('Neočekávaná chyba.');}

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





	$result = $image->find()->sort(array("_id" => -1));

    



	if ($result == NULL) {

	    $this['result']->addError('Nejsou k dispozici žádné snímky.');

	    return;

	}



	$count =0;

	$crop_count =0;

	foreach ($result as $row => $x) {











	    $images[] = $x['_id'];

      //$result2 = $image->find(array("prague_timestamp" => "P_2013-09-11_12-44.jpg", "crop_images.number" => array('$exists' => true)));

  

      if(!empty($x['crop_images'])){

      foreach ($x['crop_images'] as $x2) {

	         

          

  	$crop_count++;

	    

      }

      }else{

      $crop_count = 0;

      }  

      $crop_images[$count] = $crop_count;

       $crop_count=0;

      $count++;

	    /*$crop_image = $this->presenter->context->mongo->sunspots->crop_image;

	    $result2 = $crop_image->find(array("prague_timestamp" => $x['prague_timestamp']));

	    foreach ($result2 as $row2 => $x2) {

		$crop_count++;

	    }  $crop_images[$count] = $crop_count;

	    $crop_count = 0;

	    $count++;

	}   */

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

