<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->render(PATH_WSS.'home/index2.php',[]);
    }

    public function about()
    {    
        $this->render(PATH_WSS.'about/index.php',[]);
    }

    public function prices()
    {
        $this->render(PATH_WSS.'prices/index.php',[]);
    }

    public function projects()
    {
       $this->render(PATH_WSS.'projects/index.php',[]);
    }

    public function contact()
    {   
       
        $contactManager = new ContactManager();
        $contactManager->actionForm();
    
        $form = new Form();
        $form->contactForm();
        $contactForm = $form->create();
        $fields = explode("*",$contactForm);
        $this->render(PATH_WSS.'contact/index.php',['contactForm' => $fields]);
    }

}


