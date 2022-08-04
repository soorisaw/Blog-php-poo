<?php 


class ArticleManager extends Manager {


	public function __construct()
	{
		$this->table = 'articles';
	}

	public function saveArticle() 
	{
		if (!empty($_POST['heading']) && !empty($_POST['title']) && !empty($_POST['wysiwyg']) && !empty($_FILES['file']))
		//if(Form::validate($_POST, ['heading', 'title', 'wysiwyg']))
        	{   
			$mediaManager = new MediaManager();
			$picture = $mediaManager->saveFile(ILLUSTRATIONS);

			$heading = htmlentities($_POST['heading']);
			$title = htmlentities($_POST['title']);
			$wysiwyg = htmlentities($_POST['wysiwyg']);

			$this->executeQuery('INSERT INTO articles (heading, title, picture, wysiwyg) VALUE (:heading, :title, :picture, :wysiwyg)',
			[
				'heading' => $heading,
				'title' => $title,
				'picture' => $picture,
				'wysiwyg' => $wysiwyg
			]);
		}
	}

	public function getOneArticle($id)
	{
		$reqOneArticle = $this->executeQuery('SELECT * FROM articles WHERE id = :id', ['id' => $id ]);
		$dataArticle = $reqOneArticle->fetch();
		$article = new Article($dataArticle);

		return $article;
	}	

	public function getAllArticle()
	{
		/*$this->getPDO();
		$reqAllTopic = $this->db->prepare('SELECT * FROM topic ORDER BY dateCreation DESC ');
		$reqAllTopic->execute();*/
		$reqAllArticle = $this->executeQuery('SELECT * FROM articles ORDER BY id DESC');
		
		while ($dataArticle = $reqAllArticle->fetch())
		{
			$article = new Article($dataArticle);
			$arrayArticle[] = $article;
		}
		
		return $arrayArticle;
	}

	public function getAllArticleByHeading(string $heading)
	{
		if ($heading == 'date')
		{
			header('Location: /article ');
		}
		else
		{

			$reqAllArticle = $this->executeQuery('SELECT * FROM articles WHERE heading = :heading ORDER BY id DESC', ['heading' => $heading]);
			
			while ($dataArticle = $reqAllArticle->fetch())
			{
				$article = new Article($dataArticle);
				$arrayArticle[] = $article;
			}
			
			return $arrayArticle;
		}


	}	

	
}