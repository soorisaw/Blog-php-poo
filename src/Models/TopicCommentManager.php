<?php

class TopicCommentManager extends Manager {

	public function __construct()
	{
		$this->table = 'topicComment';
	}

	public function newTopicComment($id)
	{   
		if (!empty($_POST['newcom']) && isset($_SESSION['user']))
		//if(Form::validate($_POST, ['newcom', 'id', 'user']))
		{
			$topicId = $id;
			$userId = $_SESSION['user']->getUserId();
			$newCom = $_POST['newcom'];
			
			/*$this->getPDO();
			$reqNewcom = $this->db->prepare('INSERT INTO topicComment  (topicId, userId, commentTopic) VALUES(:topicId, :userId, :commentTopic)');
			$reqNewcom->execute(array(
				'topicId' => $topicId,
				'userId' => $userId,
				'commentTopic' => $newCom
			));*/
			$reqNewcom = $this->executeQuery('INSERT INTO topicComment  (topicId, userId, commentTopic) VALUES(:topicId, :userId, :commentTopic)', 
			[
				'topicId' => $topicId,
				'userId' => $userId,
				'commentTopic' => $newCom				
			]);
		}
		elseif(!empty($_POST['newcom']) && !isset($_SESSION['user']))
		{
			echo 'vous devez être connectés';
		}
	}


	public function getAllComment($id)
	{
		/*if (!empty($_GET['id']))
		if(Form::validate($_POST, ['id']))
		{*/
			$topicId = $id;
			//$this->getPDO();
			/*$reqAllComment = $this->db->prepare('SELECT * FROM topicComment WHERE topicId = :topicId ORDER BY commentDate ASC ');*/
			/*$reqAllComment = $this->db->prepare('SELECT `topicComment`.*, `users`.pseudo, `users`.`avatar` FROM `topicComment` LEFT JOIN `users` ON `topicComment`.`userId` = `users`.`userId` WHERE `topicComment`.`topicId` = :topicId');
			$reqAllComment->execute(array(
				'topicId' => $topicId
			));*/
			$reqAllComment = $this->executeQuery("SELECT `TC`.*, `USER`.`pseudo`, `USER`.`avatar` FROM `topicComment` AS `TC` 
								LEFT JOIN `users` AS `USER` ON `TC`.`userId` = `USER`.`userId` WHERE `TC`.`topicId` = :topicId ", ['topicId'=> $topicId]);

		//}


		while ($dataComment = $reqAllComment->fetch())
		{
		$comment = new TopicComment($dataComment);
		$arrayComment[] = $comment;
		}
		return $arrayComment;
	}

}