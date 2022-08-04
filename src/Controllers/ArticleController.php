<?php

class ArticleController extends Controller
{

    public function index()
    {
        $form = new Form();
        $form->orderByHeadingForm();
        $orderByHeadingForm = $form->create();
        $fields = explode("*",$orderByHeadingForm);

        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticle();
        $this->render(PATH_BLOG . 'article/index.php', 
            [
                'articles' => $articles,
                'orderByHeadingForm' => $fields
            ]);
    }

    public function heading ()
    {
        $form = new Form();
        $form->orderByHeadingForm();
        $orderByHeadingForm = $form->create();
        $fields = explode("*",$orderByHeadingForm);

        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticleByHeading($_POST['heading']);
        $this->render(PATH_BLOG . 'article/index.php', 
            [
                'articles' => $articles,
                'orderByHeadingForm' => $fields
            ]);
    }


    public function show($id)
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->getOneArticle($id);
        $this->render(PATH_BLOG . 'article/read/index.php', ["article" => $article]);
    }


}