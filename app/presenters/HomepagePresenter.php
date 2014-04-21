<?php
use Nette\Application\UI;
/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {
    public function renderDefault($id) {
	if (!isset($id)) {
	    $id = 0;
	}
  $session = $this->presenter->getSession('data');
  $session->redirect['presenter']= 'Homepage:';
	$session->redirect['id']= $id;
  $session->redirect2['id']= $id;
	$this -> template -> num = $id;
	$image = $this->presenter->context->mongo->sunspots->image;
  $result = $image->find();

	if ($result == NULL) {
	    $this['result']->addError('Vsechny snimky jste klasifikoval');
	    return;
	}
	$count =0;
	$crop_count =0;
	foreach ($result as $row => $x) {

	    $images[] = $x['prague_timestamp'];
	    $images_nasa[] = $x['nasa_timestamp'];
      $comment[] = $x['comment'];

	    $crop_image = $this->presenter->context->mongo->sunspots->crop_image;
      $classification = $this->presenter->context->mongo->sunspots->classification;
	    $result2 = $crop_image->find(array("prague_timestamp" => $x['prague_timestamp']));
	    $class_all = true;
      foreach ($result2 as $row2 => $x2) {
		$crop_count++;
		$crop_images[$count][$crop_count][0] = $crop_count;
		$crop_images[$count][$crop_count][1] = $x2['x1'];
		$crop_images[$count][$crop_count][2] = $x2['x2'];
		$crop_images[$count][$crop_count][3] = $x2['y1'];
		$crop_images[$count][$crop_count][4] = $x2['y2'];
    $classo = $classification->findOne(array("user" => $session->user['email'], "prague_timestamp" => substr($x['prague_timestamp'], 0, -4), "number" => $x2['number']));
      if($classo == NULL){
        $class_all = false;
            
      }
      
	    }
       
      if ($class_all){
        $class_done[] = true;
      }else{
        $class_done[] = false;
      }
	    $crop_images_count[$count] = $crop_count;
	    $crop_count = 0;

	    $count++;
	}
 
	if (isset($images)) {
	    $this -> template -> images = $images;
	    $this -> template -> images_nasa = $images_nasa;
      $this -> template -> comment = $comment;
	    $this -> template -> crop_images_count = $crop_images_count;
      $this -> template -> class_done = $class_done;
	    }
	if (isset($crop_images)) {
	    $this -> template -> crop_images = $crop_images;}
	    $this -> template -> count = $count;
      
    }

    protected function createComponentKlasifikaceForm(){
	 $form = new UI\Form;

	 $session = $this->presenter->getSession('data');

   $form->addSelect('klasifikace', 'Skvrna je typu', array(
	    'x' => '-',
	    'a' => 'A',
	    'b' => 'B',
	    'c' => 'C',
	    'd' => 'D',
	    'e' => 'E',
	    )) ->setDefaultValue($session->klasifikace);

	 $form->addTextArea ('comment', 'Komentář:')->setDefaultValue($session->comment);

    	// call method KlasifikaceFormSucceeded() on success
	 $form->addSubmit('send', 'Potvrdit změny')->onClick[] = callback($this, 'KlasifikaceFormSucceeded');

   $form->addSubmit('cancel', 'Zrušit změny')->onClick[] = callback($this, 'cancelKlasifikaceFormSubmitted');

	 return $form;
    }



    public function KlasifikaceFormSucceeded($submit) {
    // public function ratingDeleteRatingFormSubmitted(\Nette\Forms\Controls\SubmitButton $submit) {
	 $values = $submit->form->getValues();

	 $session = $this->presenter->getSession('data');
	 $session->comment = $values->comment;
	 $session->klasifikace = $values->klasifikace;
	 $this->flashMessage('Hodnocení přijato.');
	
	 $this->redirect('this');

    }

    public function cancelKlasifikaceFormSubmitted($submit) {

   $this->flashMessage('Změny zrušeny.');
	 $this->redirect('this');
    }

}
