<?php

abstract class Controller
{   
    /**
     * index
     *
     * @return void
     */
    public abstract function index();
    
    //***********************************************RENDER**************************************************/
    /**
     * render
     *
     * @param  mixed $viewFilePath
     * @return void
     */
    public function render(string $viewFilePath, array $data = []) : void
    {
        // On instancie une vue
        $vue = new View($viewFilePath);
        // On affiche la vue
        $vue->render($data);

    }

    public function access()
    {
        if( isset($_SESSION['user']) && !empty($_SESSION['user']))
        {
            $userRole = $_SESSION['user']->getRole();

            if( $userRole !== 'ADMIN')
            {
                header('Location: /');
            }
        }
        if( !isset($_SESSION['user']))
        {
            header('Location: /');
        }
    }

    

}