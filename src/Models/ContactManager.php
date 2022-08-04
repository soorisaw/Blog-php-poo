<?php 

class ContactManager {


	private $db = null;
	
	/**
	 * getPDO
	 *
	 * @return PDO
	 */
	public function getPDO()
	{
		if ($this->db === null)
		{
			try 
			{
				$db = new PDO('mysql:host=localhost;dbname=websmart;charset=utf8', 'adminbdd', 'Phpmyadmin9kbfvuu');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			$this->db = $db;			
		}

		return $this->db;
	}

	public function recordInDb($prenom,$nom,$email,$comment)
	{
		
		$req = $this->getPDO()->prepare('INSERT INTO form (prenom,nom,email,comment) VALUE(:prenom, :nom, :email, :comment)');
		$req-> execute(array(
			"prenom" => $prenom,
			"nom" => $nom,
			"email" => $email,
			"comment" => $comment
		));
		return $req;
	}
	
	public function actionForm()
	{
		if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["comment"]))
		{   
			$prenom = htmlentities($_POST["prenom"]);
			$nom = htmlentities($_POST["nom"]);
			$email = htmlentities($_POST["email"]); 
			$comment = htmlentities($_POST["comment"]);

			
			$this->recordInDb($prenom,$nom,$email,$comment);
		}
	}
}






	