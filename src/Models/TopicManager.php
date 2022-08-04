<?php 

class TopicManager extends Manager {

	public function __construct()
	{
		$this->table = 'topic';
	}

    //***********************************************METHOD CRUD********************************************************//
    public function newTopic()
    {
        if(isset($_SESSION['user']))
        //if(Form::validate($_POST, ['user']))
	    {
            if(!empty($_POST['titleTopic']) && !empty($_POST['newcom']))
            //if(Form::validate($_POST, ['titleTopic', 'commentTopic']))
	        {
                $userId = $_SESSION['user']->getUserId();
                $titleTopic = $_POST['titleTopic'];
                $commentTopic = $_POST['newcom'];
                
                /*$this->getPDO();
                        $reqTitleTopic = $this->db->prepare('INSERT INTO topic (titleTopic, userId) VALUES(:titleTopic, :userId)');
                        $reqTitleTopic->execute(array(
                            'titleTopic' => $titleTopic,
                            'userId' => $userId
                        ));

                        $reqTopicId = $this->db->prepare('SELECT topicId FROM topic WHERE userId = :userId ORDER BY dateCreation DESC LIMIT 1');
                        $reqTopicId->execute(array(
                            'userId' => $userId
                        ));*/
		        $this->executeQuery('INSERT INTO topic (titleTopic, userId) VALUES(:titleTopic, :userId)',
                    [
                        "titleTopic" => $titleTopic,
                        "userId" => $userId
                    ] );

                $reqTopicId = $this->executeQuery('SELECT topicId FROM topic WHERE userId = :userId ORDER BY dateCreation DESC LIMIT 1', ["userId" => $userId] );		
                $topicId = $reqTopicId->fetch();

                /*$reqCommentTopic = $this->getPdoInstance()->prepare('INSERT INTO topicComment (topicId, userId, commentTopic) VALUES(:topicId, :userId, :commentTopic)');
                $reqCommentTopic->execute(array(
                    'topicId' => $topicId['topicId'],
                    'userId' => $userId,
                    'commentTopic' => $commentTopic
                ));!!!!!!
                $this->executeQuery('INSERT INTO topicComment (topicId, userId, commentTopic) VALUES(:topicId, :userId, :commentTopic)',
                    [
                        "topicId" => $topicId['topicId'],
                        "userId" => $userId,
                        "commentTopic" => $commentTopic
                    ] );*/

                $topicCommentManager = new TopicCommentManager();
                $topicCommentManager->newTopicComment($topicId['topicId']);
            }
        }
        else
        {
            echo "vous devez être connecté";
        }
    }
    //--------------------------------------------Display forum-------------------------------------------------//
    public function getAllTopic()
    {
        /*$this->getPDO();
        $reqAllTopic = $this->db->prepare('SELECT * FROM topic ORDER BY dateCreation DESC ');
        $reqAllTopic->execute();*/
	    $reqAllTopic = $this->executeQuery('SELECT * FROM topic ORDER BY dateCreation DESC');

        while ($dataTopic = $reqAllTopic->fetch())
        {
            $topic = new Topic($dataTopic);
            $arrayTopic[] = $topic;
        }
        
        return $arrayTopic;
    }


    public function getOneTopic(int $id)
    {
        /*if (!empty($_GET['id']))
        if(Form::validate($_GET, ['id']))
	    {*/
            $topicId = $id;
            
            /*$this->getPDO();
                $reqOneTopic = $this->db->prepare('SELECT * FROM topic WHERE topicId = :topicId');
                $reqOneTopic->execute(array(
                    'topicId'=> $topicId
                ));*/
            $reqOneTopic = $this->executeQuery('SELECT * FROM topic WHERE topicId = :topicId', ['topicId' => $topicId]);
        //}
        
        $dataTopic = $reqOneTopic->fetch();
        $topic = new Topic($dataTopic);

        return $topic;
    }
}