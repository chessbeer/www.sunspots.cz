<?php

/**

 * Base presenter for all application presenters.

 */



abstract class BasePresenter extends \Nette\Application\UI\Presenter {







    protected $styles = array();

    protected $scripts = array();



    protected function beforeRender() {

        parent::beforeRender();



        $this->template->styles = $this->styles;

        $this->template->scripts = $this->scripts;

        

        



        $css = $this->presenter->getName() . '.css';

        if (file_exists(WWW_DIR . '/css/' . $css)) {

            $this->template->styles[] = $css;

        }


        $js = $this->presenter->getName() . '.js';

        if (file_exists(WWW_DIR . '/js/' . $js)) {

            $this->template->scripts[] = $js;

        }

        

        $session = $this->presenter->getSession('data');

        $this->template->session = $session;

        

         

        $url = $this->presenter->getName();

        if ($url != 'SignIn'){

        $this->template->session->url = $this->context->httpRequest->getUrl();

        }

      

    }



    public function handleSignOut() {

        $this->getUser()->logout(TRUE);

        

       

        //$this->presenter->getSession('data')->email = "";

        unset ($this->presenter->getSession('data')->user);

        

        $this->flashMessage('Byl si odhlášen.', 'success');

        $this->redirect('Homepage:');

    }

}

