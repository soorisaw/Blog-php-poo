<?php 

class AdminController extends Controller
{

    public function index()
    {   
        $this->access();
        $this->render(PATH_ADMIN . 'home/index.php', []);
    }

    public function agency()
    {  
        $this->access();
        $this->render(PATH_ADMIN . 'agence/index.php', []);
    }

    public function edition()
    {  
        $this->access();
        $this->render(PATH_ADMIN . 'edition/index.php', []);
    }

    public function savearticle()
    {
        $this->access();
        $articleManager = new ArticleManager();
        $articleManager->saveArticle();
        $this->render(PATH_ADMIN . 'edition/index.php', []);
    }
    
    public function forum()
    {  
        $this->access();
        $this->render(PATH_ADMIN . 'forum/index.php', []);
    }

    public function user()
    {  
        $this->access();
        $this->render(PATH_ADMIN . 'user/index.php', []);
    }

}