<?php

class Router
{
    public CONST DEFAUT_CONTROLLER = 'home';
    public CONST DEFAUT_CONTROLLER_ACTION = 'index';

    private string $controller;
    private ?string $action;
    private $param;

    public function __construct(string $request_uri)
    {
        $request_uri = explode('/', trim($request_uri, '/'));

        $this->controller = !empty($request_uri[0]) ? $request_uri[0] : self::DEFAUT_CONTROLLER;
        $this->action = $request_uri[1] ?? SELF::DEFAUT_CONTROLLER_ACTION;
        $this->param = $request_uri[2] ?? null;
    }

	//***********************************************GET CONTROLLER**************************************************/
    /**
     * getController
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

	//***********************************************GET ACTION**************************************************/
    /**
     * getAction
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
 
	//***********************************************GET PARAM**************************************************/
    /**
     * getParam
     *
     * @return string|null
     */
    public function getParam()
    {
        return $this->param;
    }

    //***********************************************EXECUTE**************************************************/
    /**
     * execute
     *
     * @return void
     */
    public function execute()
    {
        try
        {
            // Début du MVC
            // 1. On interprête la requête provenant du navigateur dans le but d'instancier le bon controleur
            // Le passage du paramètre "controller" depuis l'URL doit representer le contexte que l'on souhaite afficher
            $controllerClassName = $this->getController();
            
            $controllerClassName = ucfirst(strtolower($controllerClassName)) . 'Controller';
            $controllerFileName = PATH_CONTROLLERS . $controllerClassName . '.php';

            if(file_exists($controllerFileName))
            {
                
                $controller = new $controllerClassName();

                // 2. On appelle la bonne action
                $action = $this->getAction();
                if(method_exists($controller, $action))
                {
                    $controller->$action($this->getParam());
                }
                else
                {
                    throw new Error("L'action $action du controller $controllerClassName n'existe pas", 404);
                }

            }
            else
            {
                throw new Error("Le fichier $controllerFileName n'existe pas", 404);
            }
        }
        catch(Error $e){
            
            $this->controller = 'error';
            $this->action = 'show';
            $this->param = $e;
            $this->execute();
        }
    }
}