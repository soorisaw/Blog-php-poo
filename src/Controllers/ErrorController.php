<?php

class ErrorController extends Controller
{
    public function index(){
        return $this->show();
    }

    public function show()
    {
        header("HTTP/1.0 404 Not Found");
        $vue = new View( BASE_DIR.'templates/errors/show.php');
        $vue->render([]);
    }
}