<?php

class View
{
    public string $filename;
    
    /**
     * __construct
     *
     * @param  mixed $filename
     * @return void
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

	//***********************************************RENDER**************************************************/
    /**
     * render
     *
     * @param  mixed $data
     * @return void
     */
    public function render(array $data)
    {
        // On démarre la tamporisation
        ob_start();

        // On extrait les clefs du tableau $data sous forme de variables
        extract($data);

        // On inclue le fichier de la vue (qui sera executer dans le tampon)
        require $this->filename;

        // On recupère le contenu du tampon dans une variable et on le vide
        $content = ob_get_clean();

        // On inclue la layout globale ou celui du blog
        //layout global => 'templates/base.php';
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        if ($request_uri[0] === 'blog' || $request_uri[0] === 'forum' || $request_uri[0] === 'article' || $request_uri[0] === 'admin')
        {
            $formRegister = new Form();
            $formRegister->registerForm();
            $registerForm = $formRegister->create();
            $registration = explode("*",$registerForm);

            $formLogin = new Form();
            $formLogin->loginForm();
            $loginForm = $formLogin->create();
            $connexion = explode("*",$loginForm);

            $formLogout = new Form();
            $formLogout->logoutForm();
            $logoutForm = $formLogout->create();
            $deconnexion = explode("*",$logoutForm);

            $formUpdateProfil = new Form();
            $formUpdateProfil->updateProfilForm();
            $profilForm = $formUpdateProfil->create();
            $updateProfil = explode("*",$profilForm);
            
            require BASE_DIR . 'templates/baseBlog.php';
        }
        else
        {
            require BASE_DIR . 'templates/base.php';
        }
    }
}