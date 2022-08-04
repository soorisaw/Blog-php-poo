<?php

class BlogController extends Controller
{

    public function index()
    {
        $this->render(PATH_BLOG . 'home/index.php', []);
    }

    public function tuto()
    {
         $this->render(PATH_BLOG . 'tuto/index.php', []);
    }

    public function connect()
    {
        $userManager = new UserManager();
        $userManager->connectUser(); 
        $this->render(PATH_BLOG . 'home/index.php', []);
    }

    public function register()
    {
     
        $registration = new UserManager();
        $registration->recordNewUser();
    }


    public function disconnect()
    {      
        $disconnection = new UserManager();
        $disconnection->disconnectUser(); 
        header('Location: /home/');     
    }

    public function profil()
    {
        $profilUpDate = new UserManager();
        $profilUpDate->upDateUser();
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }

    public function delete()
    {
        $profilDelete = new UserManager();
        $profilDelete->deleteUser();
    }

}